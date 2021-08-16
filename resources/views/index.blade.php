@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card-columns" id="results">

        </div>

        <div id="pagination_controls" class="mb-5 d-flex justify-content-center">
            <button id="btn_prev" class="btn btn-danger mr-2" disabled>Previous</button>
            <button id="btn_next" class="btn btn-danger" disabled>Next</button>
        </div>
    </div>

    <script>
        function getQueryVariable(variable) {
            var query = window.location.search.substring(1);
            var vars = query.split("&");
            for (var i = 0; i < vars.length; i++) {
                var pair = vars[i].split("=");
                if (pair[0] == variable) {
                    return pair[1];
                }
            }
            return false;
        }
        $(document).ready(function () {
            $("#search-form").attr('action', '/search');
            $("#search-form").submit(function (ev) {
                $.ajax({
                    type: $('#search-form').attr('method'),
                    url: $('#search-form').attr('action'),
                    data: $('#search-form').serialize(),
                    success: function (json) {
                        //Decode de JSON
                        var decode = JSON.parse(json);
                        setImages(decode);
                        configControls(decode);
                    }
                });
                ev.preventDefault();
            });
            function setImages(decode) {
                var results = decode[0].data;
                var type = decode[1];
                var str = '';
                //If there'no results
                if (!results.length) {
                    str = `<h2 class="text-center text-muted mt-5">There's no result's to show</h2>`;
                } else {
                    //If the results type are picture
                    if (type) {
                        $("#results").attr("class", "card-columns");
                        str = ``;
                        for (let picture of results) {
                            str += `<div class="card">
                                    <a href="/picture_details/${picture.id}">
                                        <img class="card-img-top" src="${picture.image}">
                                    </a>
                                </div>`;
                        }
                        str += ``;
                        //If the results type are profiles
                    } else {
                        $("#results").attr("class", "row");
                        for (let profile of results) {
                            str += `
                            <!--User's presentation card-->
                            <div class="col-12 col-lg-5 card shadow profile-card m-2">
                                <div class="row row-cols-3">
                                    <!--Avatar-->
                                    <div class="col d-flex justify-content-center m-0 p-0">
                                        <img width="70px" height="70px" class="avatar align-self-center rounded-profile my-1" src="${profile.avatar}">
                                    </div>
                                    <!--Information-->
                                    <div class="col card-body p-1 align-self-center">
                                        <h5 class="card-title mt-3">${profile.name}</h5>
                                    
                                        <a href="/profiles/${profile.id}" class="btn btn-danger mt-1">Ver perf&iacute;l</a>
                                    </div>
                                </div>
                            </div>
                        `;
                            /*
                            if (profile.enableSignature) {
                                str += `
                                <blockquote class="blockquote mb-0">
                                    <footer class="blockquote-footer">
                                        <i>${profile.signature}</i>
                                    </footer>
                                </blockquote>
                            `;
                            }
                            str += 
                        `;*/
                        }
                    }
                }
                //Set the images
                $("#results").html(str);
            }
            function enableControls(decode){
                if(decode[0].prev_page_url){
                    $("#btn_prev").removeAttr('disabled');
                }else{
                    $("#btn_prev").attr('disabled', 'true');
                }
                if(decode[0].next_page_url){
                    $("#btn_next").removeAttr('disabled');
                }else{
                    $("#btn_next").attr('disabled', 'true');
                }
            }
            function configControls(decode){
                enableControls(decode);
                if( !$("#btn_prev").attr('disabled') ){
                    $("#btn_prev").click(function () {
                        $.ajax({
                            type: 'GET',
                            url: decode[0].prev_page_url,
                            dataType: 'json',
                            success: function (arr) {
                                setImages(arr);
                                configControls(arr);
                            }
                        });
                    });
                }
                if( !$("#btn_next").attr('disabled') ){
                    $("#btn_next").click(function () {
                        $.ajax({
                            type: 'GET',
                            url: decode[0].next_page_url,
                            dataType: 'json',
                            success: function (arr) {
                                setImages(arr);
                                configControls(arr);
                            }
                        });
                    });
                }
            }
            if (getQueryVariable('radioSearch')) {
                $("#search_input").val(getQueryVariable('search'));
                if($("input[name='radioSearch']:checked").val() != getQueryVariable('radioSearch')){
                    $("#radio_pictures").prop("checked", false);
                    $("#radio_profiles").prop("checked", true);
                }
            }
            $("#search-form").submit();
        });
        $(window).on('load', function () {
            if (getQueryVariable('radioSearch')) {
                setTimeout(function () {
                    $('#search_button').click()
                }, 100);
            }
        });
    </script>
@endsection