/**
 * fujiDebug - onscreen debug. vs using console.log()
 * @type {{div: HTMLElement, clear: Function, append: Function}}
 */
fujiDebug = {

    div: document.getElementById("debug-window"),

    clear: function(){
        $(fujiDebug.div).html('');
    },

    append: function(str){
        $(fujiDebug.div).append($('<p>').text(str));
        fujiDebug.div.scrollTop = fujiDebug.div.scrollHeight;
    }

};