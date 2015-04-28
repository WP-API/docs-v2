## Pages

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
| `parent` | integer | The ID for the parent of the object. | view, edit |
| `title` | object | The title for the object. | view, edit |
| `content` | object | The content for the object. | view, edit |
| `author` | integer | The ID for the author of the object. | view, edit |
| `excerpt` | object | The excerpt for the object. | view, edit |
| `featured_image` | integer | ID of the featured image for the object. | view, edit |
| `comment_status` | string | Whether or not comments are open on the object. | view, edit |
| `ping_status` | string | Whether or not the object can be pinged. | view, edit |
| `menu_order` | integer | The order of the object in relation to other object of its type. | view, edit |
| `template` | string | The theme file to use to display the object. | view, edit |

### List all Pages

### Create a Page

### Retrieve a Page

### Update a Page

### Delete a Page