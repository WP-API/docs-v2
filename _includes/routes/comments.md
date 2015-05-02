## Comments

### Schema

| Property | Type | Description | Context |
| :------- | :--- | :---------- | :------ |
| `id` | integer | Unique identifier for the object. | view, edit |
| `author` | integer | The ID of the user object, if author was a user. | view, edit |
| `author_email` | email | Email address for the object author. | edit |
| `author_ip` | string | IP address for the object author. | edit |
| `author_name` | string | Display name for the object author. | view, edit |
| `author_url` | uri | Url for the object author. | view, edit |
| `author_user_agent` | string | User agent for the object author. | edit |
| `content` | object | The content for the object. | view, edit |
| `date` | date-time | The date the object was published. | view, edit |
| `date_gmt` | date-time | The date the object was published as GMT. | edit |
| `karma` | integer | Karma for the object. | edit |
| `link` | uri | URL to the object. | view, edit |
| `parent` | integer | The ID for the parent of the object. | view, edit |
| `post` | integer | The ID of the associated post object. | view, edit |
| `status` | string | State of the object. | view, edit |
| `type` | string | Type of Comment for the object. | view, edit |

### List all Comments

### Create a Comment

### Retrieve a Comment

### Update a Comment

### Delete a Comment
