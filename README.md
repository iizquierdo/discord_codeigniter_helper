# Discord Webhook / Codeigniter Helper!

This is a simple helper that allows you to send messages to a discord channel through Webhooks.

You need to call thi helper

```sh
$this->load->helper('discord');
```

And call this function:

```sh
discordSendMessage($message, $webhook_id, $webhook_token,  $username, $avatar_url);
```


