/**
 * 
 * @returns {undefined}
 * This is a seperate file because it's nessesary for the AJAX to be completed before we do anything else.
 */
$(function() {
    date = new Date();
    hour = date.getHours();
    if (hour >= 21 || hour <= 5) {
        $('img[src="img/star.png"]').attr('src', 'img/star-night.png');

    }
    $('.star').click(function() {
        stripper = this.id.replace('story', '').split('_');
        parentId = '#link' + stripper[0];
        if ($(parentId).attr('clicked') === 'true') {
            alert('You have already voted for this link');
            return false;
        }
        console.log($(parentId).attr('clicked'));
        $(parentId).attr('clicked', 'true');
        console.log(parentId);
        link = $(parentId).attr('href');
        /*
         /@
         __        __   /\/
         /==\      /  \_/\/   
         /======\    \/\__ \__
         /==/\  /\==\    /\_|__ \
         /==/    ||    \=\ / / / /_/
         /=/    /\ || /\   \=\/ /     
         /===/   /   \||/   \   \===\
         /===/   /_________________ \===\
         /====/   / |                /  \====\
         /====/   /   |  _________    /  \   \===\    THE LEGEND OF 
         /==/   /     | /   /  \ / / /  __________\_____      ______       ___
         |===| /       |/   /____/ / /   \   _____ |\   /      \   _ \      \  \
         \==\             /\   / / /     | |  /= \| | |        | | \ \     / _ \
         \===\__    \    /  \ / / /   /  | | /===/  | |        | |  \ \   / / \ \
         \==\ \    \\ /____/   /_\ //  | |_____/| | |        | |   | | / /___\ \
         \===\ \   \\\\\\\/   /////// /|  _____ | | |        | |   | | |  ___  |
         \==\/     \\\\/ / //////   \| |/==/ \| | |        | |   | | | /   \ |
         \==\     _ \\/ / /////    _ | |==/     | |        | |  / /  | |   | |
         \==\  / \ / / ///      /|\| |_____/| | |_____/| | |_/ /   | |   | |
         \==\ /   / / /________/ |/_________|/_________|/_____/   /___\ /___\
         \==\  /               | /==/
         \=\  /________________|/=/    
         \==\     _____     /==/ 
         / \===\   \   /   /===/
         / / /\===\  \_/  /===/
         / / /   \====\ /====/
         / / /      \===|===/
         |/_/         \===/
         */
        rating = parseInt(stripper[1]) + 1; //We want it to be an actual one, not a zero. We keep it a zero up to here, but now it becomes a one.
        console.log("Rating:" + rating);
        ajax_setup = {};
        ajax_setup.url = 'stories/ajaxAddRating/' + rating + '?url=' + link;
        ajax_setup.success = function(rs) {
            console.log(rs)
            alert('Vote successful');
        };
        $.ajax(ajax_setup);
    });

    $('.star').mouseenter(function() {
        parent = $(this).attr('data-parent');
        i = this.id.split('_')[1];


        while (i >= 0) {
            $("#" + parent + '_' + i.toString()).addClass('hover');
            i--;
        }
    });
    $('.star').mouseout(function() {
        $('.star').removeClass('hover');
    });
    $('#tip').on('click', function() {
        $('#tip').fadeOut(500);
    });
    $('.unsubscribe').on('click', function(eventData) {
        console.log(this.id);
        console.log("unsubscribing...");
        var ajax_setup = {};
        ajax_setup.url = 'categories/deleteRecommendation/' + this.id;
        ajax_setup.dataType = 'html';
        ajax_setup.error = function() {
            console.log('Something is very wrong');

        };
        ajax_setup.success = function(response) {
            alert('You will not receive any more stories like this one.');
            return false;

        };
        $.ajax(ajax_setup);
        return false;

    });
});