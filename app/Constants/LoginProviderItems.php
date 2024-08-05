<?php

namespace App\Constants;

enum LoginProviderItems: string
{
  case GOOGLE = 'https://developers.google.com/identity/gsi/web/guides/get-google-api-clientid';
  case FACEBOOK = 'https://developers.facebook.com/docs/facebook-login/overview';
  case GITHUB = 'https://docs.github.com/en/apps/creating-github-apps/registering-a-github-app/registering-a-github-app';
  case TWITTER = 'https://developer.twitter.com/en/docs/twitter-api/getting-started/getting-access-to-the-twitter-api';
}
