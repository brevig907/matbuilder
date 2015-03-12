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
                    var func = $(this).attr('data-func');
                    fujiDebug.append('Toolmenu button clicked. Function: '+func);
                });
            });
    }


};