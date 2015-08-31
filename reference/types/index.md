---
title: Post Types API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/types
resource: Type
---

<section class="route">
	<div class="primary">
		<h2>Schema</h2>
		<table class="attributes">
			{% for property in site.data.terms.schema.properties %}
				<tr>
					<td>
						<code>{{ property[0] }}</code><br />
						<span class="type">
							{{ property[1].type }}{% if property[1].format %}, {% case property[1].format %}
								{% when 'date-time' %}
									datetime (ISO8601)
								{% when 'uri' %}
									uri
								{% else %}
									property[1].format
							{% endcase %}{% endif %}
						</span>
					</td>
					<td>
						<p>{{ property[1].description }}</p>
						{% if property[1].readonly %}
							<p>(Read only)</p>
						{% endif %}
						<p class="context">Context: <code>{{ property[1].context | join:"</code>, <code>"}}</code></p>
					</td>
				</tr>
			{% endfor %}
		</table>
	</div>
	<div class="secondary">
		<h3>Example Request</h3>

		$ curl -X OPTIONS -i http://demo.wp-api.org/{{ page.route_path }}
	</div>
</section>

### List all {{ page.resource }}s

### Create a {{ page.resource }}

### Retrieve a {{ page.resource }}

### Update a {{ page.resource }}

### Delete a {{ page.resource }}
