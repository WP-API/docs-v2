---
title: Comments API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/comments
resource: Comment
---

<section class="route">
	<div class="primary">
		<h2>{{ page.resource }} Object Schema</h2>
		<table class="attributes">
			{% for property in site.data.comments.schema.properties %}
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

		<code>$ curl -X OPTIONS -i http://demo.wp-api.org/{{ page.route_path }}</code>
	</div>
</section>

<section class="route">
	<h2>List all {{ page.resource }}s</h2>

	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.comments.endpoints[0].args %}
				<tr>
					<td>
						<code>{{ arg[0] }}</code><br />
					</td>
					<td>
						<p class="required">
							Required: {{ arg[1].required }}
						</p>
						<p class="default">
							{% if arg[1].default %}
								Default: <code>{{ arg[1].default }}</code>
							{% endif %}
						</p>
					</td>
				</tr>
			{% endfor %}
		</table>
	</div>
	<div class="secondary">
		<h3>Definition</h3>

		<code> {{ site.data.comments.endpoints[0].methods[0] }} http://demo.wp-api.org/{{ page.route_path }}</code>
		
		<h3>Example Request</h3>

		<code>$ curl http://demo.wp-api.org/{{ page.route_path}}</code>
	</div>
</section>
<section class="route">
	<h2>Create a {{ page.resource }}</h2>
	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.comments.endpoints[1].args %}
				<tr>
					<td>
						<code>{{ arg[0] }}</code><br />
					</td>
					<td>
						<p class="required">
							Required: {{ arg[1].required }}
						</p>
						<p class="default">
							{% if arg[1].default %}
								Default: <code>{{ arg[1].default }}</code>
							{% endif %}
						</p>
					</td>
				</tr>
			{% endfor %}
		</table>
	</div>
	<div class="secondary">
		<h3>Definition</h3>

		<code> {{ site.data.comments.endpoints[1].methods[0] }} http://demo.wp-api.org/{{ page.route_path }}</code>
	</div>
</section>
<h2>Retrieve a {{ page.resource }}</h2>

<h2>Update a {{ page.resource }}</h2>

<h2>Delete a {{page.resource}}</h2>
