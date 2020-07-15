<?php
namespace App\Tests;
use Symfony\Component\Panther\PantherTestCase;
class E2eTagTest extends PantherTestCase
{
    public function testTagExists(): void
    {
        $client = static::createPantherClient(['browser'=>static::FIREFOX]); // Your app is automatically started using the built-in web server
        $client->request('GET', '/tag/');
        // Use any PHPUnit assertion, including the ones provided by Symfony
        $this->assertPageTitleContains('Tag index');
        $this->assertSelectorTextContains('body', 'vel optio provident');
    }
    public function testCanCreateNewTag(): void
    {
        $tag = 'foo bar baz';
        // chrome
        $client = static::createPantherClient(['browser'=>static::FIREFOX]);
        // firefox
        // $client = static::createPantherClient(['browser' => static::FIREFOX]);
        $client->request('GET', '/tag/new');
        $client->submitForm('Save', [
            'tag[name]' => $tag,
            'tag[posts][]' => [1, 2],
        ]);
        $client->request('GET', '/tag/');
        // Use any PHPUnit assertion, including the ones provided by Symfony
        $this->assertPageTitleContains('Tag index');
        $this->assertSelectorTextContains('body', $tag);
    }
}
