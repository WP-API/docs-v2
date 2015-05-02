## Posts

### Schema

| Property | Type | Description | Context |
| :------- | :--- | :---------- | :------ |
| `date` | date-time | The date the object was published. | view, edit |
| `date_gmt` | date-time | The date the object was published, as GMT. | edit |
| `guid` | object | The globally unique identifier for the object. | view, edit |
| `id` | integer | Unique identifier for the object. | view, edit |
| `link` | uri | URL to the object. | view, edit |
| `modified` | date-time | The date the object was last modified. | view, edit |
| `modified_gmt` | date-time | The date the object was last modified, as GMT. | view, edit |
| `password` | string | A password to protect access to the post. | edit |
| `slug` | string | An alphanumeric identifier for the object unique to its type. | view, edit |
| `status` | string | A named status for the object. | edit |
| `type` | string | Type of Post for the object. | view, edit |
| `title` | object | The title for the object. | view, edit |
| `content` | object | The content for the object. | view, edit |
| `author` | integer | The ID for the author of the object. | view, edit |
| `excerpt` | object | The excerpt for the object. | view, edit |
| `featured_image` | integer | ID of the featured image for the object. | view, edit |
| `comment_status` | string | Whether or not comments are open on the object. | view, edit |
| `ping_status` | string | Whether or not the object can be pinged. | view, edit |
| `format` | string | The format for the object. | view, edit |
| `sticky` | boolean | Whether or not the object should be treated as sticky. | view, edit |

### List all Posts

### Create a Post

### Retrieve a Post

### Update a Post

### Delete a Post
