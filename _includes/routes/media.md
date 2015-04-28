## Media

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
| `author` | integer | The ID for the author of the object. | view, edit |
| `comment_status` | string | Whether or not comments are open on the object. | view, edit |
| `ping_status` | string | Whether or not the object can be pinged. | view, edit |
| `alt_text` | string | Alternative text to display when attachment is not displayed. | view, edit |
| `caption` | string | The caption for the attachment. | view, edit |
| `description` | string | The description for the attachment. | view, edit |
| `media_type` | string | Type of attachment. | view, edit |
| `media_details` | object | Details about the attachment file, specific to its type. | view, edit |
| `post` | integer | The ID for the associated post of the attachment. | view, edit |
| `source_url` | uri | URL to the original attachment file. | view, edit |

### List all Attachments

### Create an Attachment

### Retrieve an Attachment

### Update an Attachment

### Delete an Attachment
