// Imports.
import fastify from 'fastify';
import fs from 'fs';
import { Server as SocketServer } from 'socket.io';
import fastifySocketIO from 'fastify-socket.io';
import mime from 'mime';

// Set server.
const server = fastify();

// Socket.io integration.
server.register(fastifySocketIO, {
    // options
});

// Define a route.
server.get('/*', async (request, reply) => {
  let { '*': path } = request.params;
  if(path.length < 1) {
      path = "/index.html";
  }
  try{
    // Attempt to read the file from ./web/path.
    const fileContent = await fs.promises.readFile(`./web/${path}`);
    let contentType = mime.getType(path) || 'application/octet-stream';
  
    reply
      .code(200)
      .header('Content-Type', contentType)
      .send(fileContent);
  } catch (error) {
    // If there's an error reading the file, serve an error page.
    try {
      const errorPage = await fs.promises.readFile('./errors/404.html', 'utf8');
      
      reply
          .code(404)
          .header('Content-Type', 'text/html')
          .send(errorPage);
    } catch (error) {
      // This is really bad, first it tried getting the page, then error page, and it couldn't.
      reply
          .code(500)
          .send('Internal Server Error');
    }
  }
});

// Socket.io handler
server.ready((err) => {
    if (err) throw err;

    server.io.on('connection', (socket) => {
        console.log('A user connected');
      
        // Handle socket events here
      
        socket.on('disconnect', () => {
            console.log('User disconnected');
        });
    });
});

// Start the server
server.listen({ port: 6999 }, (err, address) => {
    if(err) {
        console.error(err);
        process.exit(1);
    }
    console.log(`Server listening on ${address}`);
});