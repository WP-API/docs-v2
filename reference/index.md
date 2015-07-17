---
page: introduction
title: API Reference
has_superbar: Yes
---

{% capture intro %}
# API Reference

The API is organized around [REST][]. Our API is designed to have predictable, resource-oriented URLs and to use HTTP response codes to indicate API errors. We use built-in HTTP features, like HTTP authentication and HTTP verbs, which can be understood by off-the-shelf HTTP clients, and we support cross-origin resource sharing to allow you to interact securely with our API from a client-side web application. JSON will be returned in all responses from the API, including errors.

[REST]: http://en.wikipedia.org/wiki/Representational_state_transfer
{% endcapture %}

<section class="route">
	<div class="primary">{{ intro | markdownify }}</div>
</section>

<section class="route">
	<div class="primary">
		{% capture posts %}{% include routes/posts.md %}{% endcapture %}
		{{ posts | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture pages %}{% include routes/pages.md %}{% endcapture %}
		{{ pages | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture media %}{% include routes/media.md %}{% endcapture %}
		{{ media | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture post_meta %}{% include routes/post_meta.md %}{% endcapture %}
		{{ post_meta | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture post_revisions %}{% include routes/post_revisions.md %}{% endcapture %}
		{{ post_revisions | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture comments %}{% include routes/comments.md %}{% endcapture %}
		{{ comments | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture taxonomies %}{% include routes/taxonomies.md %}{% endcapture %}
		{{ taxonomies | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture terms %}{% include routes/terms.md %}{% endcapture %}
		{{ terms | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>

<section class="route">
	<div class="primary">
		{% capture users %}{% include routes/users.md %}{% endcapture %}
		{{ users | markdownify }}
	</div>
	<div class="secondary"><h3>Example Request</h3><pre>{ "This is an example": true }</pre></div>
</section>
