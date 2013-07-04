$(function() {
    var site_url = 'http://local.breader.eu/';
    var ajax_setup = {};
    ajax_setup.url = site_url + 'categories/getProfiles';
    ajax_setup.dataType = 'json';
    ajax_setup.cache = false;
    ajax_setup.success = function(result) {
         $('select#profile option').remove();
        $("#profile").append(new Option("Current profile(not saved)", "cur"));
        i = 0;
        while (i < result.length) {
            $("#profile").append(new Option(result[i].name, result[i].id));
            
            i++;

        }
        $("#profile").append(new Option("New...", "new"));
        $('#profile').prop('disabled',false);
    };

    ajax_setup.error = function(result) {
        console.log('Problems incoming!');
    };
    $.ajax(ajax_setup);
    $('#profile').change(function(eventObject) {

        changeId = $('#profile').val();
        if (changeId == 'new') {
            $('#savenew').css('display', 'block');
        }
        //We want to just get profile picks, so this is why there is an empty else here >:)
        else if (changeId == 'cur') {

        }
        else {
            ajax_setup = {};
            ajax_setup.url = site_url + 'categories/getProfile/' + changeId;
            ajax_setup.cache = false;
            ajax_setup.dataType = 'json';
            ajax_setup.success = function(rs) {
                $('.selector').prop('checked', false);
                console.log(rs.cats);
                array = rs.cats.split(',');
                i = 0;
                while (i < array.length) {
                    console.log('#' + array[i]);
                    $('#' + array[i]).prop('checked', true);
                    i++;
                }
            };
            ajax_setup.error = function(rs) {
                console.log('PROBLEM!');

            }
            $.ajax(ajax_setup);
        }
    });
    $('#save').on('click', function() {
        if ($('#profileName').val().length < 1) {
            alert('Your profile name is too short!');
            return false;
        }
        var categories = '';
        $('.selector').each(function(id, el) {
            if ($('#' + el.id).prop('checked') == true) {
                categories += el.id + ',';
            }
        });
        categories = categories.substr(0, categories.length - 1);
        console.log(categories);
        var ajax_setup = {};
        ajax_setup.url = site_url + 'categories/writeProfile';
        ajax_setup.dataType = 'json';
        ajax_setup.cache = false;
        ajax_setup.type='POST';
        ajax_setup.data={};
        ajax_setup.data.categories=categories;
        ajax_setup.data.profileName=$('#profileName').val();
        ajax_setup.success = function(result) {
            alert('Added the new profile! You can now select it from the list');
            location.reload(); 
        };

        ajax_setup.error = function(result) {
            console.log('Problems incoming!');
        };
        $.ajax(ajax_setup);
    });
});