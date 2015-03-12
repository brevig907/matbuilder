/**
 * grid - creates and destroys canvas background grid.
 *
 * @author michael brevig <michaelbrevig@gmail.com>
 * @type {{id: string, context: string, setId: Function, create: Function, reset: Function}}
 */
grid = {

    id: '',
    context: '',

    setId: function(id){
        grid.id = id;

    },
    create: function(){
        if (grid.id == '') {
            alert('id not set');
            return false;
        }

        var c_canvas = document.getElementById(grid.id);
        grid.context = c_canvas.getContext("2d");

        for (var x = 0.5; x < 800; x += 50) {
            grid.context.moveTo(x, 0);
            grid.context.lineTo(x, 800);

        }
        for (var y = 0.5; y < 800; y += 50) {
            grid.context.moveTo(0, y);
            grid.context.lineTo(800, y);
        }

        grid.context.strokeStyle = "#eee";
        grid.context.stroke();

        fujiDebug.append('created grid 50x50 = 1 sq metre');
    },
    reset: function(){
        grid.context = [];
    }

};