var conn = new WebSocket('ws://' +socket_host+':'+socket_port);
console.log('ws://' +socket_host+':'+socket_port);
conn.onopen = function(e) {
    console.log("Connection established!");
};

conn.onmessage = function(e) {
    console.log(e.data);
};

/**
 * Submit has been pressed excute sending
 * to server.
 */
$('.btn-send').on('click', function() {
    var input_value = $('.client_chat').val();
    console.log(conn);
    console.log(input_value);
    conn.send(input_value);
    $('.client_chat').val('');
});