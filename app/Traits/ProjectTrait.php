<?php

namespace App\Traits;

use App\Models\Project;
use Cviebrock\EloquentSluggable\Services\SlugService;

trait ProjectTrait 
{
    /**
    * Create regular or static methods here
    */

    public function store_row($request)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'location' => $request->location_en,
                'sector' => $request->sector_en,
                'brief' => $request->brief_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'location' => $request->location_ar,
                'sector' => $request->sector_ar,
                'brief' => $request->brief_ar,
                'description' => $request->description_ar
            ],
            'image' => image_manipulate($request->image , 'projects' , 920 , 640),
            'brochure' => $request->brochure ? image_manipulate($request->brochure , 'projects') : null,
            'size' => $request->size,
            'category_id' => $request->category_id,
            'slug' => SlugService::createSlug(Project::class , 'slug' , $request->name_en , ['unique' => true]),
            'map' => $request->map
        ];

        Project::create($data);
    }

    public function update_row($request , $project)
    {
        $data = [
            'en' => [
                'name' => $request->name_en,
                'location' => $request->location_en,
                'sector' => $request->sector_en,
                'brief' => $request->brief_en,
                'description' => $request->description_en
            ],
            'ar' => [
                'name' => $request->name_ar,
                'location' => $request->location_ar,
                'sector' => $request->sector_ar,
                'brief' => $request->brief_ar,
                'description' => $request->description_ar
            ],
            'size' => $request->size,
            'category_id' => $request->category_id,
            'map' => $request->map
        ];

        if ($request->image) {
            image_delete($project->image , 'projects');
            $data['image'] = image_manipulate($request->image , 'projects' ,920 , 640);
        }

        if ($request->brochure) {
            image_delete($project->brochure , 'projects');
            $data['brochure'] = image_manipulate($request->brochure , 'projects');
        }

        if ($request->name_en != $project->translate('en')->name) {
            $data['slug'] = SlugService::createSlug(Project::class ,'slug' , $request->name_en , ['unique' => true]);
        }
        
        $project->update($data);

    }
}