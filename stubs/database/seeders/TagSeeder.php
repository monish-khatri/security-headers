<?php

namespace App\Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->delete();
        $tagString = 'Advertising-Advice-Android-Anime-Apple-Architecture-Art-Baking-Beauty-Bible-Blog-Blogging-Book Reviews-Books-Business-Canada-Cars-Cartoons-Celebrities-Celebrity-Children-Christian-Christianity-Comedy-Comics-Cooking-Cosmetics-Crafts-Cuisine-Culinary-Culture-Dating-Design-Diy-Dogs-Drawing-Economy-Education-Entertainment-Environment-Events-Exercise-Faith-Family-Fantasy-Fashion-Fiction-Film-Fitness-Folk-Food-Football-France-Fun-Funny-Gadgets-Games-Gaming-Geek-Google-Gossip-Graphic Design-Green-Health-Hip Hop-History-Home-Home Improvement-Homes-Humor-Humour-Hunting-Illustration-Indie-Inspiration-Interior Design-Internet-Internet Marketing-Iphone-Italy-Kids-Landscape-Law-Leadership-Life-Lifestyle-Literature-London-Love-Management-Marketing-Media-Men-Mobile-Money-Movies-Music-Nature-News-Nutrition-Opinion-Painting-Parenting-Personal-Personal Development-Pets-Philosophy-Photo-Photography-Photos-Pictures-Poetry-Politics-Real Estate-Recipes-Relationships-Religion-Reviews-Running-Sales-Satire-Science-Seo-Sex-Shopping-Soccer-Social Media-Software-Spirituality-Sports-Technology-Television-Tips-Travel-Tutorials-Tv-Uk-Vacation-Video-Videos-Voices.com-Web-Web Design-Weight Loss-Wellness-Wildlife-Wine-Women-Wordpress-Writing';
        $tags = explode('-', $tagString);
        foreach ($tags as $key => $tag) {
            Tag::create([
                "name" => $tag,
            ]);
        }
    }
}
