# Paginado

Para el páginado procede a agregar los parámetros `page` y `limit` a la petición get de las funcionalidades de Listar Grupos, Notificaciones,  Publicidad y Mensajes.

###### Ej. Obtener los mensajes de un grupo

```curl
GET /messages/group/2?page=1&limit=100

```