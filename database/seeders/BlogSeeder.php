<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            'title' => 'Zimovanje na Jahorini',
            'short_description' => 'Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum.',
            'description' => '<p><strong>Maecenas sapien ante, mollis ac diam non, ultrices consequat felis.</strong> Integer eget diam et urna suscipit gravida eu id lorem. Curabitur pellentesque ligula ut suscipit aliquam. Sed ac odio sed dolor consequat egestas sit amet vitae nisl. Vestibulum interdum, ex consectetur euismod elementum, quam nisl vulputate ligula, at placerat massa ex a nunc. Vestibulum ornare nulla a tortor feugiat commodo. Nullam sed leo et magna porttitor suscipit vitae ut libero. Vestibulum mollis porttitor eros, at blandit nisl aliquet vitae. Vestibulum vulputate sagittis bibendum.
            </p><p>
            <em>Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum. Duis ornare, orci in porta tristique, elit dolor accumsan purus, vel porta velit leo ac orci. Nunc gravida, lorem ut ornare condimentum, tellus arcu tempor erat, sed dignissim nunc risus sit amet magna. In hac habitasse platea dictumst. Maecenas eu lacus ipsum. Etiam porttitor efficitur sodales. Fusce ac purus venenatis, bibendum purus a, consequat dolor. Donec euismod lacus non tortor lobortis gravida. Phasellus ac placerat est. Vivamus dignissim sapien sit amet justo faucibus malesuada. Aliquam rhoncus arcu quis neque pharetra, eu faucibus erat sagittis.</em></p><p>
            Proin eget mauris sagittis, malesuada mauris efficitur, varius neque. Nulla bibendum, felis non volutpat viverra, orci turpis feugiat est, vitae blandit dolor ipsum et nibh. Integer tempor vel neque at ullamcorper. Nunc tempor ante turpis, a varius sem facilisis quis. Fusce cursus et nisi ac tristique. Phasellus eleifend nulla ut elit euismod egestas. Pellentesque pellentesque dolor diam. Phasellus scelerisque ex nec odio mollis, eu fringilla sem sollicitudin. Praesent eget nibh at nunc consectetur ultricies. Donec cursus lectus ac massa dictum pulvinar. Nam ut ipsum porta ante pellentesque condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ultricies sem porttitor purus auctor, pretium efficitur enim malesuada. Etiam ac eros lorem.</p>',
            'image' => '1663758215jahorina1.jpg',
            'user_id' => 1,
            'date_published' => '2022-09-23 05:34:36',
            'date_created' => '2022-09-21 13:03:35',
            'type' => 1
        ]);
        DB::table('blogs')->insert([
            'title' => 'Guzva na Granici',
            'short_description' => 'Maecenas id augue ut nunc vehicul sagittis. Praesent placerat enim eget augue porttitor finibus cursus ac tortor. Integer neque sapien, mollis vel tempus ac, vulputate nec ligula. Integer ut rhoncus erat. Etiam ipsum felis, sagittis posuere congue at, auctor sit amet lorem. Duis sed libero nibh. Vestibulum porttitor, turpis quis pharetra efficitur, libero metus sodales neque, in varius turpis libero vel quam.',
            'description' => '<p><strong>Maecenas sapien ante, mollis ac diam non, ultrices consequat felis.</strong> Integer eget diam et urna suscipit gravida eu id lorem. Curabitur pellentesque ligula ut suscipit aliquam. Sed ac odio sed dolor consequat egestas sit amet vitae nisl. Vestibulum interdum, ex consectetur euismod elementum, quam nisl vulputate ligula, at placerat massa ex a nunc. Vestibulum ornare nulla a tortor feugiat commodo. Nullam sed leo et magna porttitor suscipit vitae ut libero. Vestibulum mollis porttitor eros, at blandit nisl aliquet vitae. Vestibulum vulputate sagittis bibendum.
            </p><p>
            <em>Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum. Duis ornare, orci in porta tristique, elit dolor accumsan purus, vel porta velit leo ac orci. Nunc gravida, lorem ut ornare condimentum, tellus arcu tempor erat, sed dignissim nunc risus sit amet magna. In hac habitasse platea dictumst. Maecenas eu lacus ipsum. Etiam porttitor efficitur sodales. Fusce ac purus venenatis, bibendum purus a, consequat dolor. Donec euismod lacus non tortor lobortis gravida. Phasellus ac placerat est. Vivamus dignissim sapien sit amet justo faucibus malesuada. Aliquam rhoncus arcu quis neque pharetra, eu faucibus erat sagittis.</em></p><p>
            Proin eget mauris sagittis, malesuada mauris efficitur, varius neque. Nulla bibendum, felis non volutpat viverra, orci turpis feugiat est, vitae blandit dolor ipsum et nibh. Integer tempor vel neque at ullamcorper. Nunc tempor ante turpis, a varius sem facilisis quis. Fusce cursus et nisi ac tristique. Phasellus eleifend nulla ut elit euismod egestas. Pellentesque pellentesque dolor diam. Phasellus scelerisque ex nec odio mollis, eu fringilla sem sollicitudin. Praesent eget nibh at nunc consectetur ultricies. Donec cursus lectus ac massa dictum pulvinar. Nam ut ipsum porta ante pellentesque condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ultricies sem porttitor purus auctor, pretium efficitur enim malesuada. Etiam ac eros lorem.</p>',
            'image' => '1663917918evzoni-prelaz-2-62.png',
            'user_id' => 1,
            'date_published' => '2022-09-22 12:22:57',
            'date_created' => '2022-09-22 08:40:58',
            'type' => 0
        ]);
        DB::table('blogs')->insert([
            'title' => 'Letovanje u Grckoj',
            'short_description' => 'Nam lobortis dolor libero, sit amet egestas justo porttitor et. Vestibulum id neque nec metus gravida blandit ut auctor metus. Nam nisi eros, gravida et tellus ut, rutrum lacinia nunc.',
            'description' => '<p><strong>Maecenas sapien ante, mollis ac diam non, ultrices consequat felis.</strong> Integer eget diam et urna suscipit gravida eu id lorem. Curabitur pellentesque ligula ut suscipit aliquam. Sed ac odio sed dolor consequat egestas sit amet vitae nisl. Vestibulum interdum, ex consectetur euismod elementum, quam nisl vulputate ligula, at placerat massa ex a nunc. Vestibulum ornare nulla a tortor feugiat commodo. Nullam sed leo et magna porttitor suscipit vitae ut libero. Vestibulum mollis porttitor eros, at blandit nisl aliquet vitae. Vestibulum vulputate sagittis bibendum.
            </p><p>
            <em>Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum. Duis ornare, orci in porta tristique, elit dolor accumsan purus, vel porta velit leo ac orci. Nunc gravida, lorem ut ornare condimentum, tellus arcu tempor erat, sed dignissim nunc risus sit amet magna. In hac habitasse platea dictumst. Maecenas eu lacus ipsum. Etiam porttitor efficitur sodales. Fusce ac purus venenatis, bibendum purus a, consequat dolor. Donec euismod lacus non tortor lobortis gravida. Phasellus ac placerat est. Vivamus dignissim sapien sit amet justo faucibus malesuada. Aliquam rhoncus arcu quis neque pharetra, eu faucibus erat sagittis.</em></p><p>
            Proin eget mauris sagittis, malesuada mauris efficitur, varius neque. Nulla bibendum, felis non volutpat viverra, orci turpis feugiat est, vitae blandit dolor ipsum et nibh. Integer tempor vel neque at ullamcorper. Nunc tempor ante turpis, a varius sem facilisis quis. Fusce cursus et nisi ac tristique. Phasellus eleifend nulla ut elit euismod egestas. Pellentesque pellentesque dolor diam. Phasellus scelerisque ex nec odio mollis, eu fringilla sem sollicitudin. Praesent eget nibh at nunc consectetur ultricies. Donec cursus lectus ac massa dictum pulvinar. Nam ut ipsum porta ante pellentesque condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ultricies sem porttitor purus auctor, pretium efficitur enim malesuada. Etiam ac eros lorem.</p>',
            'image' => '1663835256halkidiki-grcka--letovanje.jpg',
            'user_id' => 1,
            'date_published' => '2022-09-22 11:02:01',
            'date_created' => '2022-09-22 10:27:36',
            'type' => 1
        ]);
        DB::table('blogs')->insert([
            'title' => 'Guzva na Jadranskom moru',
            'short_description' => `There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.`,
            'description' => '<p><strong>Maecenas sapien ante, mollis ac diam non, ultrices consequat felis.</strong> Integer eget diam et urna suscipit gravida eu id lorem. Curabitur pellentesque ligula ut suscipit aliquam. Sed ac odio sed dolor consequat egestas sit amet vitae nisl. Vestibulum interdum, ex consectetur euismod elementum, quam nisl vulputate ligula, at placerat massa ex a nunc. Vestibulum ornare nulla a tortor feugiat commodo. Nullam sed leo et magna porttitor suscipit vitae ut libero. Vestibulum mollis porttitor eros, at blandit nisl aliquet vitae. Vestibulum vulputate sagittis bibendum.
            </p><p>
            <em>Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum. Duis ornare, orci in porta tristique, elit dolor accumsan purus, vel porta velit leo ac orci. Nunc gravida, lorem ut ornare condimentum, tellus arcu tempor erat, sed dignissim nunc risus sit amet magna. In hac habitasse platea dictumst. Maecenas eu lacus ipsum. Etiam porttitor efficitur sodales. Fusce ac purus venenatis, bibendum purus a, consequat dolor. Donec euismod lacus non tortor lobortis gravida. Phasellus ac placerat est. Vivamus dignissim sapien sit amet justo faucibus malesuada. Aliquam rhoncus arcu quis neque pharetra, eu faucibus erat sagittis.</em></p><p>
            Proin eget mauris sagittis, malesuada mauris efficitur, varius neque. Nulla bibendum, felis non volutpat viverra, orci turpis feugiat est, vitae blandit dolor ipsum et nibh. Integer tempor vel neque at ullamcorper. Nunc tempor ante turpis, a varius sem facilisis quis. Fusce cursus et nisi ac tristique. Phasellus eleifend nulla ut elit euismod egestas. Pellentesque pellentesque dolor diam. Phasellus scelerisque ex nec odio mollis, eu fringilla sem sollicitudin. Praesent eget nibh at nunc consectetur ultricies. Donec cursus lectus ac massa dictum pulvinar. Nam ut ipsum porta ante pellentesque condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ultricies sem porttitor purus auctor, pretium efficitur enim malesuada. Etiam ac eros lorem.</p>',
            'image' => '1663848321_112270204_gettyimages-1163303315.jpg',
            'user_id' => 1,
            'date_published' => '2022-09-23 09:45:09',
            'date_created' => '2022-09-22 14:05:21',
            'type' => 0
        ]);
        DB::table('blogs')->insert([
            'title' => 'Leto na Tari',
            'short_description' => `Integer ac odio nec augue posuere porttitor eget vel ante. Integer nec iaculis mauris, sed pellentesque tellus. Sed tristique dui in ex vulputate semper. Sed pulvinar metus in nisi dapibus luctus. Sed molestie viverra sodales. Suspendisse mattis felis ut auctor tincidunt. Sed sit amet quam quis justo sagittis venenatis.`,
            'description' => '<p><strong>Maecenas sapien ante, mollis ac diam non, ultrices consequat felis.</strong> Integer eget diam et urna suscipit gravida eu id lorem. Curabitur pellentesque ligula ut suscipit aliquam. Sed ac odio sed dolor consequat egestas sit amet vitae nisl. Vestibulum interdum, ex consectetur euismod elementum, quam nisl vulputate ligula, at placerat massa ex a nunc. Vestibulum ornare nulla a tortor feugiat commodo. Nullam sed leo et magna porttitor suscipit vitae ut libero. Vestibulum mollis porttitor eros, at blandit nisl aliquet vitae. Vestibulum vulputate sagittis bibendum.
            </p><p>
            <em>Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum. Duis ornare, orci in porta tristique, elit dolor accumsan purus, vel porta velit leo ac orci. Nunc gravida, lorem ut ornare condimentum, tellus arcu tempor erat, sed dignissim nunc risus sit amet magna. In hac habitasse platea dictumst. Maecenas eu lacus ipsum. Etiam porttitor efficitur sodales. Fusce ac purus venenatis, bibendum purus a, consequat dolor. Donec euismod lacus non tortor lobortis gravida. Phasellus ac placerat est. Vivamus dignissim sapien sit amet justo faucibus malesuada. Aliquam rhoncus arcu quis neque pharetra, eu faucibus erat sagittis.</em></p><p>
            Proin eget mauris sagittis, malesuada mauris efficitur, varius neque. Nulla bibendum, felis non volutpat viverra, orci turpis feugiat est, vitae blandit dolor ipsum et nibh. Integer tempor vel neque at ullamcorper. Nunc tempor ante turpis, a varius sem facilisis quis. Fusce cursus et nisi ac tristique. Phasellus eleifend nulla ut elit euismod egestas. Pellentesque pellentesque dolor diam. Phasellus scelerisque ex nec odio mollis, eu fringilla sem sollicitudin. Praesent eget nibh at nunc consectetur ultricies. Donec cursus lectus ac massa dictum pulvinar. Nam ut ipsum porta ante pellentesque condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ultricies sem porttitor purus auctor, pretium efficitur enim malesuada. Etiam ac eros lorem.</p>',
            'image' => '16638499731-planina-tara-1-1024x576.jpg',
            'user_id' => 1,
            'date_published' => '2022-09-22 14:32:53',
            'date_created' => '2022-09-22 14:32:53',
            'type' => 1
        ]);
        DB::table('blogs')->insert([
            'title' => 'Povoljno osiguranje za Pariz',
            'short_description' => `Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae enim dolor. Quisque nisi dolor, aliquam eu mauris eget, auctor posuere odio. Sed nec aliquam tellus. Morbi hendrerit ultrices ligula quis tempus. Etiam in cursus leo. Maecenas ac metus tempus, pulvinar arcu dictum, ullamcorper risus.`,
            'description' => '<p><strong>Maecenas sapien ante, mollis ac diam non, ultrices consequat felis.</strong> Integer eget diam et urna suscipit gravida eu id lorem. Curabitur pellentesque ligula ut suscipit aliquam. Sed ac odio sed dolor consequat egestas sit amet vitae nisl. Vestibulum interdum, ex consectetur euismod elementum, quam nisl vulputate ligula, at placerat massa ex a nunc. Vestibulum ornare nulla a tortor feugiat commodo. Nullam sed leo et magna porttitor suscipit vitae ut libero. Vestibulum mollis porttitor eros, at blandit nisl aliquet vitae. Vestibulum vulputate sagittis bibendum.
            </p><p>
            <em>Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum. Duis ornare, orci in porta tristique, elit dolor accumsan purus, vel porta velit leo ac orci. Nunc gravida, lorem ut ornare condimentum, tellus arcu tempor erat, sed dignissim nunc risus sit amet magna. In hac habitasse platea dictumst. Maecenas eu lacus ipsum. Etiam porttitor efficitur sodales. Fusce ac purus venenatis, bibendum purus a, consequat dolor. Donec euismod lacus non tortor lobortis gravida. Phasellus ac placerat est. Vivamus dignissim sapien sit amet justo faucibus malesuada. Aliquam rhoncus arcu quis neque pharetra, eu faucibus erat sagittis.</em></p><p>
            Proin eget mauris sagittis, malesuada mauris efficitur, varius neque. Nulla bibendum, felis non volutpat viverra, orci turpis feugiat est, vitae blandit dolor ipsum et nibh. Integer tempor vel neque at ullamcorper. Nunc tempor ante turpis, a varius sem facilisis quis. Fusce cursus et nisi ac tristique. Phasellus eleifend nulla ut elit euismod egestas. Pellentesque pellentesque dolor diam. Phasellus scelerisque ex nec odio mollis, eu fringilla sem sollicitudin. Praesent eget nibh at nunc consectetur ultricies. Donec cursus lectus ac massa dictum pulvinar. Nam ut ipsum porta ante pellentesque condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ultricies sem porttitor purus auctor, pretium efficitur enim malesuada. Etiam ac eros lorem.</p>',
            'image' => '1663927835Pariz-5-1180x787.jpg',
            'user_id' => 3,
            'date_published' => '2022-09-23 10:08:51',
            'date_created' => '2022-09-23 12:08:51',
            'type' => 0
        ]);
        DB::table('blogs')->insert([
            'title' => 'Najpovoljnija putna osiguranja kod nas',
            'short_description' => `Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae enim dolor. Quisque nisi dolor, aliquam eu mauris eget, auctor posuere odio. Sed nec aliquam tellus. Morbi hendrerit ultrices ligula quis tempus. Etiam in cursus leo. Maecenas ac metus tempus, pulvinar arcu dictum, ullamcorper risus.`,
            'description' => '<p><strong>Maecenas sapien ante, mollis ac diam non, ultrices consequat felis.</strong> Integer eget diam et urna suscipit gravida eu id lorem. Curabitur pellentesque ligula ut suscipit aliquam. Sed ac odio sed dolor consequat egestas sit amet vitae nisl. Vestibulum interdum, ex consectetur euismod elementum, quam nisl vulputate ligula, at placerat massa ex a nunc. Vestibulum ornare nulla a tortor feugiat commodo. Nullam sed leo et magna porttitor suscipit vitae ut libero. Vestibulum mollis porttitor eros, at blandit nisl aliquet vitae. Vestibulum vulputate sagittis bibendum.
            </p><p>
            <em>Curabitur mollis nulla et metus sodales tempus. Integer feugiat, eros eget dictum aliquet, ex nulla convallis urna, vel vestibulum lectus justo nec neque. Nulla efficitur malesuada lacus, quis posuere diam tincidunt vel. Nullam vitae ligula nec eros facilisis rutrum. Duis ornare, orci in porta tristique, elit dolor accumsan purus, vel porta velit leo ac orci. Nunc gravida, lorem ut ornare condimentum, tellus arcu tempor erat, sed dignissim nunc risus sit amet magna. In hac habitasse platea dictumst. Maecenas eu lacus ipsum. Etiam porttitor efficitur sodales. Fusce ac purus venenatis, bibendum purus a, consequat dolor. Donec euismod lacus non tortor lobortis gravida. Phasellus ac placerat est. Vivamus dignissim sapien sit amet justo faucibus malesuada. Aliquam rhoncus arcu quis neque pharetra, eu faucibus erat sagittis.</em></p><p>
            Proin eget mauris sagittis, malesuada mauris efficitur, varius neque. Nulla bibendum, felis non volutpat viverra, orci turpis feugiat est, vitae blandit dolor ipsum et nibh. Integer tempor vel neque at ullamcorper. Nunc tempor ante turpis, a varius sem facilisis quis. Fusce cursus et nisi ac tristique. Phasellus eleifend nulla ut elit euismod egestas. Pellentesque pellentesque dolor diam. Phasellus scelerisque ex nec odio mollis, eu fringilla sem sollicitudin. Praesent eget nibh at nunc consectetur ultricies. Donec cursus lectus ac massa dictum pulvinar. Nam ut ipsum porta ante pellentesque condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin ultricies sem porttitor purus auctor, pretium efficitur enim malesuada. Etiam ac eros lorem.</p>',
            'image' => '1663932579prijava-stete-putno-osiguranje-1200x630.jpg',
            'user_id' => 3,
            'date_published' => '2022-09-23 11:29:39',
            'date_created' => '2022-09-23 11:29:39',
            'type' => 1
        ]);
        
    }
}
