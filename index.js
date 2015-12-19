var app = require('http').createServer(handler);
var io = require('socket.io')(app);

app.listen(8087);
var no = 0, member = {};

io.on('connection', function (socket) {

    var user_id = socket.id;

    member[user_id] = socket;
    socket.emit('display', no);

    socket.on('add', function (data) {
        no++;

        for(i in member){
            member[i].emit('display', no);
        }

        console.log('nomor ditambah ', no);
    });

    socket.on('disconnect', function (data) {

        delete member[user_id];
    });
});

function handler (req, res) {
    fs.readFile(__dirname + '/index.html',
    function (err, data) {
        if (err) {
            res.writeHead(500);
            return res.end('Error loading index.html');
        }

        res.writeHead(200);
        res.end(data);
    });
}

console.log('server started');