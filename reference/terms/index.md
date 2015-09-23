---
title: Terms API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/terms
resource: Term
---

<section class="route">
	<div class="primary">
		<h2>{{ page.resource }} Object Schema</h2>
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

		$ curl -X OPTIONS -i http://demo.wp-api.org/{{ page.route_path }}/{taxonomy}
	</div>
</section>
<section class="route">
	<h2>List all Taxonomy {{ page.resource }}s</h2>

	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.terms.endpoints[0].args %}
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

		<code> {{ site.data.terms.endpoints[0].methods[0] }} http://demo.wp-api.org/wp-json/wp/v2/terms/{taxonomy}</code>
		
		<h3>Example Request</h3>

		<code>$ curl http://demo.wp-api.org/{{ page.route_path}}/{taxonomy}</code>
	</div>
</section>

<section class="route">
	<h2>Create a Taxonomy {{ page.resource }}</h2>

	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.terms.endpoints[1].args %}
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

		<code> {{ site.data.terms.endpoints[1].methods[0] }} http://demo.wp-api.org/{{ page.route_path }}/{taxonomy}</code>
		
	</div>
</section>
### Retrieve a Taxonomy {{ page.resource }}

### Update a Taxonomy {{ page.resource }}

### Delete a Taxonomy {{ page.resource }}
