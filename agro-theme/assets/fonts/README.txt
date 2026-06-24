README — fonts

This folder should contain webfont files exported from your logobook (WOFF2 recommended).

Steps to include fonts from the logobook:
1. Export or obtain WOFF2 (and WOFF or TTF as fallback) files for the primary logobook fonts.
2. Place them in assets/fonts/ and name them to match the entries in assets/css/fonts.css, or edit fonts.css to match the actual file names.
3. The theme will attempt to load local fonts first. If local fonts are absent, Google Fonts loaded in functions.php will be used as a fallback.

Recommended formats: WOFF2, then WOFF. For licensing reasons, ensure you have rights to host the fonts.
