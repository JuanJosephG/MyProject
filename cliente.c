#include <arpa/inet.h>
#include <errno.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include "csapp.h"
#include <sys/mman.h>

#define MAXLINE_CLIENT 1024

int main(int argc, char* argv[])
{
	int clientfd;
	char *port;
	char *host, buf[MAXLINE_CLIENT];
    char *directorio;


	if (argc != 4) {
		fprintf(stderr, "usage: %s <host> <port> <filename>\n", argv[0]);
		exit(0);
	}
	host = argv[1];
	port = argv[2];

	clientfd = Open_clientfd(host, port);

	//Se envia el nombre del archivo que es el tercer argumento de ejecutable
	write(clientfd, argv[3], strlen(argv[3]));

    shutdown(clientfd, SHUT_WR);

    //lee cuantos bytes tiene el archivo y lo imprime
    size_t  get = read(clientfd, buf, MAXLINE_CLIENT - 1);
        
    if (strcmp(buf,"-1") != 0) {
        buf[get] = '\0';
        fprintf(stdout, "File:  %s bytes\n", buf);

        //convierte e
        int textsize = atoi(buf);

        if(textsize >= 0){

            directorio = "./cliente/";

            char *ruta;

            ruta = malloc(strlen(directorio) + strlen(argv[3]) + 1);

            strcpy(ruta, directorio);
            strcat(ruta, argv[3]);

        	//crea un archivo llamado recibido.txt cuando el archivo es > 0 bytes
        	int fd = open(ruta, O_RDWR | O_CREAT | O_TRUNC, (mode_t)0600);

        	if(textsize > 0){

        		char *text;

                text = malloc(sizeof(char) * (textsize + 1));

                

                get = read(clientfd, text, textsize + 1);
                printf("CLiente: %d\n", clientfd);
        		//lee el contenido del .txt enviado por el servidor
        		while (get == 0) {
                    get = read(clientfd, text, textsize + 1);
                    printf("Tamanio: %d\n", get);
                    printf("CLiente: %d\n", clientfd);
                }

                printf("Tamanio: %d\n", get);
                printf("Texto: %s\n", text);

        		//escribe el contenido ene l archivo creado
        		write (fd, text, textsize);

                free(text);
        	}

        	close(fd);
            printf("Archivo guardado en: %s\n", ruta);
        	// fprintf(stdout, "Archivo escrito como: \n", buf);

        }
    } 
    else {
        printf("Archivo no encontrado\n");
    }
    close(clientfd);



}
