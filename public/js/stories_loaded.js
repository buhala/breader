/**
 * 
 * @returns {undefined}
 * This is a seperate file because it's nessesary for the AJAX to be completed before we do anything else.
 */
$(function() {
    $('.star').click(function(){
       stripper=this.id.replace('story','').split('_');
       parentId='#link'+stripper[0];
       console.log(parentId);
       link=$(parentId).attr('href');
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
       rating=stripper[1]+1; //We want it to be an actual one, not a zero. We keep it a zero up to here, but now it becomes a one.
       console.log(rating);
    });
        
    $('.star').mouseenter(function() {
        parent=$(this).attr('data-parent');
        i = this.id.split('_')[1];
        
        
        while (i >= 0) {
            $("#"+parent+'_'+i.toString()).addClass('hover');
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
        var site_path = 'http://local.breader.eu/';
        var ajax_setup = {};
        ajax_setup.url = site_path + 'categories/deleteRecommendation/' + this.id;
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