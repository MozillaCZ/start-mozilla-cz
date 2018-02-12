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
      config.each do |d|
        case d['type'].downcase
          when 'json'
            json(site, d)
          when 'rss'
            rss(site, d)
          else
            raise "Unknown type '#{d['type']}' of '#{d['name']}'. Supported are 'json' and 'rss'."
          end
      end
    end

    def json(site, d)
      open(d['url'], 'r') do |file|
        site.data[d['name']] = JSON.parse(file.read)
      end
    end

    def rss(site, d)
      open(d['url'], 'r') do |file|
        site.data[d['name']] = JSON.parse(FeedParser::Parser.parse(file.read).to_json)
      end
    end

  end
end
