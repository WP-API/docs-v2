require 'net/http'
require 'json'

def add_simple_schemas(http)
  schemas = [ 'comments', 'media', 'posts', 'pages', 'statuses', 'taxonomies', 'terms','types', 'users']

  schemas.each {
    |schema|
    response = http.send_request('OPTIONS', '/wp-json/wp/v2/' + schema)
    file = File.new('_data/' + schema + '.json', 'w')
    parsed_data = JSON.parse(response.body)
    # puts data
    file.write(JSON.pretty_generate(parsed_data))
  }
end

def add_terms_schema(http)
  response = http.send_request('OPTIONS', '/wp-json/wp/v2/terms/category')
  file = File.new('_data/terms.json', 'w')
  parsed_data = JSON.parse(response.body)
  # puts data
  file.write(JSON.pretty_generate(parsed_data))
end

res = Net::HTTP.start("wpapi.dev", 80) {
  |http|
  add_simple_schemas(http)
  add_terms_schema(http)
}



