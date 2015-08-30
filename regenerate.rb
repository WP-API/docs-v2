require 'net/http'
require 'json'

schemas = [ 'comments', 'media', 'posts', 'pages', 'statuses', 'taxonomies', 'types', 'users']

res = Net::HTTP.start("demo.wp-api.org", 80) {
  |http|
  schemas.each {
    |schema|
    response = http.send_request('OPTIONS', '/wp-json/wp/v2/' + schema)
    file = File.new('_data/' + schema + '.json', 'w')
    parsed_data = JSON.parse(response.body)
    # puts data
    file.write(JSON.pretty_generate(parsed_data))
  }

}



