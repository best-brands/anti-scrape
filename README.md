# anti-scrape

A simple anti scraping module that verifies crawlers and user agents.

## Checking if we are dealing with a verified crawler

You can use this smarty template anywhere you like to output specific things (like json-ld) only to verified search engines.

```smarty
{if $webcrawler_verification_status !== 1}
    <script type="application/json+ld"></script>
{/if}
```
