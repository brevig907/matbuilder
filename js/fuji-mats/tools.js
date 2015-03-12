/**
 * tools - user tools for mat building process.
 *
 * @author michael brevig <michaelbrevig@gmail.com>
 * @type {{menu: {}, init: Function, bindActions: Function}}
 */
tools = {

    menu: {},

    init: function(){
        tools.menu = $('#toolmenu');
    },

    bindActions: function(){
        $(tools.menu)
            .find('button.active-btn')
            .each(function(){
                $(this).bind('click', function(){
                    console.log('clicked');
                    var func = $(this).attr('data-func');
                    fujiDebug.append('Tool button clicked. Function: '+func);

                    //var action = tools[func];
                    //action(this);
                    if(func == 'settings'){
                        tools.settings(this);
                    }
                });
            });
    },

    settings: function(obj){
        var activeDiv = $(obj).parent().parent();
        var settingsDiv = $('#toolSettings');


        activeDiv.after(settingsDiv);

    }
}






;