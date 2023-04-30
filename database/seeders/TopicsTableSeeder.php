<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('topics')->delete();

        $topics = json_decode(file_get_contents(resource_path('data/topics.json')), true);

        foreach ($topics as $subjectSlug => $subjectTopics) {
            $subject = Subject::where('slug', $subjectSlug)->first();
            if (!$subject) {
                throw new \Exception("Subject with slug '{$subjectSlug}' not found.");
            }

            foreach ($subjectTopics as $topic) {
                $this->insertTopic($topic, $subject->id);
            }
        }
    }

    /**
     * Insert a topic into the `topics` table.
     *
     * @param  array      $topic
     * @param  int|null   $subjectId
     * @param  int|null   $parentId
     * @return void
     */
    protected function insertTopic(array $topic, ?int $subjectId = null, ?int $parentId = null)
    {
        // Insert the topic into the `topics` table.
        $id = DB::table('topics')->insertGetId([
            'title' => $topic['title'],
            'description' => isset($topic['description']) ? $topic['description'] : null,
            'slug' => $topic['slug'],
            'icon' => isset($topic['icon']) ? $topic['icon'] : null,
            'subject_id' => $subjectId,
            'parent_id' => $parentId,
        ]);

        // If the topic has child topics, insert them recursively.
        if (isset($topic['children'])) {
            foreach ($topic['children'] as $childTopic) {
                $this->insertTopic($childTopic, $subjectId, $id);
            }
        }
    }
}
