require 'json'
require 'open-uri'
require 'feedparser'

module Jekyll_Get_Remote_Data
  class Generator < Jekyll::Generator
    safe true
    priority :highest

    def generate(site)
      config = site.config['get_remote_data']
      if !config
        return
      end
      if !config.kind_of?(Array)
        config = [config]
      end
      site.data['rss_feeds'] = Hash.new
      config.each do |d|
        file_as_json = nil
        open(d['url'], 'r') do |file|
          case d['type'].downcase
            when 'json'
              file_as_json = file.read
            when 'rss'
              file_as_json = FeedParser::Parser.parse(file.read).to_json
            else
              raise "Unknown type '#{d['type']}' of '#{d['name']}'. Supported are 'json' and 'rss'."
            end
        end
        site.data[d['name']] = JSON.parse(file_as_json)
        site.data[d['name']]['origin_url'] = d['url']
      end
    end

  end
end
