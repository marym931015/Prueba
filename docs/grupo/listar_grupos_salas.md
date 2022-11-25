# GET /groups-rooms

Filtra los grupos de publicaciones de la lista de grupos.

Nota: El parámetro `publication_team` es falso, dice si un grupo es de publicaciones o no

## Salida

```json
[
  {
    "id": 0,
    "photo_url": "string",
    "name": "string",
    "description": "string",
    "user_id": 0,
    "personal_group": true,
    "publication_team": false,
    "owner_name": "string",
    "owner_email": "string",
    "owner_phone_number": "string",
    "limit": 0,
    "categories": [
      {
        "id": 0,
        "name": "string",
        "description": "string"
      }
    ],
    "members": [
      {
        "id": 0,
        "first_name": "string",
        "last_name": "string",
        "email": "string",
        "show_email": true,
        "phone_number": 0,
        "show_phone_number": true,
        "phone_number_verified": true,
        "country_id": 0,
        "country": "string",
        "country_state_id": 0,
        "country_state": "string",
        "role_id": 0,
        "role": "string",
        "current_team_id": 0,
        "current_team": "string",
        "profile_photo_url": "string",
        "company_name": "string",
        "company_email": "string",
        "company_phone_number": "string",
        "company_address": "string",
        "company_country_id": 0,
        "company_country": "string",
        "company_country_state_id": 0,
        "company_country_state": "string",
        "company_city": "string",
        "company_zip_code": "string",
        "show_company": true,
        "general_category_id": 0,
        "general_category": "string",
        "edited_general_category": true,
        "current_category_id": 0,
        "current_category": "string",
        "edited_current_category": true,
        "primary_comercial_role_id": 0,
        "primary_comercial_role": "string",
        "secondary_comercial_role_id": 0,
        "secondary_comercial_role": "string",
        "registered_at": "2021-06-10T22:02:22.514Z",
        "last_activity_at": "2021-06-10T22:02:22.514Z",
        "accept_terms_conditions": false
      }
    ],
    "created_at": "2021-06-10T22:02:22.514Z"
  }
]
```