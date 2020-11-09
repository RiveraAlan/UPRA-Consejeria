// CodeMirror, copyright (c) by Marijn Haverbeke and others
// Distributed under an MIT license: https://codemirror.net/LICENSE

// declare global: tern, server

var server;

this.onmessage = function(e) {
  var data = e.data;
  switch (data.type) {
  case "init": return startServer(data.defs, data.plugins, data.scripts);
  case "add": return server.addstudent_record(data.name, data.text);
  case "del": return server.delstudent_record(data.name);
  case "req": return server.request(data.body, function(err, reqData) {
    postMessage({id: data.id, body: reqData, err: err && String(err)});
  });
  case "getstudent_record":
    var c = pending[data.id];
    delete pending[data.id];
    return c(data.err, data.text);
  default: throw new Error("Unknown message type: " + data.type);
  }
};

var nextId = 0, pending = {};
function getstudent_record(student_record, c) {
  postMessage({type: "getstudent_record", name: student_record, id: ++nextId});
  pending[nextId] = c;
}

function startServer(defs, plugins, scripts) {
  if (scripts) importScripts.apply(null, scripts);

  server = new tern.Server({
    getstudent_record: getstudent_record,
    async: true,
    defs: defs,
    plugins: plugins
  });
}

this.console = {
  log: function(v) { postMessage({type: "debug", message: v}); }
};
