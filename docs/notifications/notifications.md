# Listado de Notificaciones 

###### Datos almacenados en base de datos

| Atributos  | Descripción |
| ------------- | ------------- |
| code  | Código  |
| title  | Título  |
| description  | Descripción  |
| image  | Imagen  |

### 1. Cuenta verificada

    + code: AccountVerified

### 2. Solicitud de amistad

    + code: FriendRequest

### 3. Rechazo de cambio de grupo

    + code: GroupChangeRejected

### 4. Cambio de grupo

    + code: GroupChangeRequest

### 5. Nuevo Grupo

    + code: NewGroup

### 6. Nuevo miembro en grupo

    + code: NewMember

### 7. Nueva publicación

    + code: NewPublication
    
### 7. Notificar al vendedor

    + code: NotifySeller
    
### 8. Notificar de Nuevo Contacto (Variación de NewMember para el caso de los privados)

    + code: NewContact


# Ejemplo de como hacer un JSON 

```json
{
    "code": "TipoNotificación"
}
```