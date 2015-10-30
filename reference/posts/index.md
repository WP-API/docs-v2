---
title: Posts API Reference
has_superbar: Yes
route_path: wp-json/wp/v2/posts
resource: Post
---

<section class="route">
	<div class="primary">
		<h2>Schema</h2>
		<table class="attributes">

			{% for property in site.data.post.schema.properties %}
				<tr id="schema-{{ property[0] }}">
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

		$ curl -X OPTIONS -i http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts'].nicename }}
	</div>
</section>

<section class="route">
	<h2>List {{ page.resource }}s</h2>

	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.post.routes['/wp/v2/posts'].endpoints[0].args %}
				<tr>
					<td>
						<code>{{ arg[0] }}</code><br />
					</td>
					<td>
						{% if arg[1].required %}
							<p class="required">
								Required: {{ arg[1].required }}
							</p>
						{% endif %}
						{% if arg[1].default %}
							<p class="default">
								Default: <code>{{ arg[1].default }}</code>
							</p>
						{% endif %}
					</td>
				</tr>
			{% endfor %}
		</table>
	</div>
	<div class="secondary">
		<h3>Definition</h3>

		<code> GET http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts'].nicename }}</code>

		<h3>Example Request</h3>

		<code>$ curl http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts'].nicename }}</code>
	</div>
</section>

<section class="route">
	<h2>Retrieve a {{ site.data.post.schema.title }}</h2>

	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.post.routes['/wp/v2/posts/<id>'].endpoints[0].args %}
				<tr>
					<td>
						<code>{{ arg[0] }}</code><br />
					</td>
					<td>
						{% if arg[1].required %}
							<p class="required">
								Required: {{ arg[1].required }}
							</p>
						{% endif %}
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

		<code>GET http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts/<id>'].nicename }}</code>

		<h3>Example Request</h3>

		<code>$ curl http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts/<id>'].nicename }}</code>
	</div>
</section>

<section class="route">
	<h2>Create a {{ page.resource }}</h2>
	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.posts.endpoints[1].args %}
				<tr>
					<td>
						<code><a href="#schema-{{ arg[0] }}">{{ arg[0] }}</a></code><br />
					</td>
					<td>
						{% if arg[1].required %}
							<p class="required">
								Required: {{ arg[1].required }}
							</p>
						{% endif %}
						{% if arg[1].default %}
							<p class="default">
								Default: <code>{{ arg[1].default }}</code>
							</p>
						{% endif %}
					</td>
				</tr>
			{% endfor %}
		</table>
	</div>
	<div class="secondary">
		<h3>Definition</h3>

		<code>POST http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts'].nicename }}</code>
	</div>
</section>

<section class="route">
	<h2>Update a {{ site.data.post.schema.title }}</h2>

	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.post.routes['/wp/v2/posts/<id>'].endpoints[1].args %}
				<tr>
					<td>
						<code><a href="#schema-{{ arg[0] }}">{{ arg[0] }}</a></code><br />
					</td>
					<td>
						{% if arg[1].required %}
							<p class="required">
								Required: {{ arg[1].required }}
							</p>
						{% endif %}
						{% if arg[1].default %}
							<p class="default">
								Default: <code>{{ arg[1].default }}</code>
							</p>
						{% endif %}
					</td>
				</tr>
			{% endfor %}
		</table>
	</div>
	<div class="secondary">
		<h3>Definition</h3>

		<code>POST http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts/<id>'].nicename }}</code>

		<h3>Example Request</h3>

		<code>$ curl -X POST http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts/<id>'].nicename }}</code>
	</div>
</section>

<section class="route">
	<h2>Delete a {{ site.data.post.schema.title }}</h2>

	<div class="primary">
		<h3>Arguments</h3>
		<table class="arguments">
			{% for arg in site.data.post.routes['/wp/v2/posts/<id>'].endpoints[2].args %}
				<tr>
					<td>
						<code>{{ arg[0] }}</code><br />
					</td>
					<td>
						{% if arg[1].required %}
							<p class="required">
								Required: {{ arg[1].required }}
							</p>
						{% endif %}
						{% if arg[1].default %}
							<p class="default">
								Default: <code>{{ arg[1].default }}</code>
							</p>
						{% endif %}
					</td>
				</tr>
			{% endfor %}
		</table>
	</div>
	<div class="secondary">
		<h3>Definition</h3>

		<code>DELETE {{ site.data.post.routes['/wp/v2/posts/<id>'].nicename }}</code>

		<h3>Example Request</h3>

		<code>$ curl -X DELETE http://demo.wp-api.org/{{ site.data.post.routes['/wp/v2/posts/<id>'].nicename }}</code>
	</div>
</section>
