<?php

namespace App\Livewire\Admin\Properties;

use App\Models\Location;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $addVideoModalOpen = false;
    public $video_title, $video_sort_order, $video_duration, $video_thumbnail, $video_id;

    public $id, $title, $location, $property_type, $location_id, $status = false, $featured_image_id, $hero_video_id, $hero_image_id, $description, $additional_info=[], $address=[], $embaded_map, $gallery, $videos, $meta_title, $meta_description, $meta_keywords, $meta_image_id, $slug, $area_measurement, $bedroom_count, $bathroom_count, $parking_count, $project_type, $project_status;
    public $aminities = [];
    public $aminitiesModalOpen = false;
    public $amintyName = '';
    public $additionalName='', $additionalValue='';
    public $addressName='', $addressValue='';
    protected $listeners = ['mediaSelected', 'updateAmenityOrder','updateAdditionalOrder', 'updateAddressOrder'];
    public $editMode = false;
    public $property;
 public function mount(Request $request)
    {
        if($request->has('edit')){
            $id = (int)$request->edit;

            $this->property = Property::find($id);
            if($this->property){
                 $this->editMode = true;
                $this->id = $this->property->id;
                $this->title = $this->property->title;
                $this->location = $this->property->location;
                $this->location_id = $this->property->location_id;
                $this->property_type = $this->property->type;
                $this->status = $this->property->status;
                $this->featured_image_id = $this->property->featured_image_id;
                $this->hero_image_id = $this->property->hero_image_id;
                $this->hero_video_id = $this->property->hero_video_id;
                $this->description = $this->property->description;
                $this->additional_info = $this->property->additional_info;
                $this->address = $this->property->address;
                $this->embaded_map = $this->property->embaded_map;
                $this->gallery = $this->property->gallery;
                $this->videos = $this->property->videos;
                $this->aminities = $this->property->amenities;
                $this->meta_title = $this->property->meta_title;
                $this->meta_description = $this->property->meta_description;
                $this->meta_keywords = $this->property->meta_keywords;
                $this->meta_image_id = $this->property->meta_image_id;
                $this->slug = $this->property->slug;
                $this->area_measurement = $this->property->area_measurement;
                $this->bedroom_count = $this->property->bedroom_count;
                $this->bathroom_count = $this->property->bathroom_count;
                $this->parking_count = $this->property->parking_count;
            }else{
                return redirect()->route('admin.properties')->with('toast', [
                    'type' => 'error',
                    'message' => 'Property not found or Invalid request'
                ]);
            }
        }
    }
    public function mediaSelected($field, $id)
    {
        // dd($field);
        if (is_array($id)) {
            $this->$field = array_unique(array_merge($this->$field ?? [], $id));
        } else {
            $this->$field = $id;
        }
        // $this->{$field} = array_merge($this->{$field} ?? [], (array)$id);

    }
    public function addAmenity()
    {
        $this->validate([
            'amintyName' => 'required|string|max:255'
        ]);

        $this->aminities[] = $this->amintyName;

        $this->reset('amintyName');
         $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Amenities added successfully'
        ]);
    }

    public function removeAmenity($index)
    {
        unset($this->aminities[$index]);
        $this->aminities = array_values($this->aminities);
         $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Amenities removed successfully'
        ]);
    }
     public function updateAmenityOrder($orderedIds)
    {
        $new = [];

        foreach ($orderedIds as $index) {
            $new[] = $this->aminities[$index];
        }

        $this->aminities = $new;
        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Amenities order updated successfully'
        ]);
    }
    public function addAdditional()
    {
        $this->validate([
            'additionalName' => 'required|string|max:255',
            'additionalValue' => 'required|string|max:255'
        ]);

        $this->additional_info[] = ['name'=>$this->additionalName , 'value' => $this->additionalValue];

        $this->reset('additionalName', 'additionalValue');
         $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Additional info added successfully'
        ]);
    }

    public function removeAdditional($index)
    {
        unset($this->additional_info[$index]);
        $this->additional_info = array_values($this->additional_info);
         $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Additional info removed successfully'
        ]);
    }
     public function updateAdditionalOrder($orderedIds)
    {
        $new = [];

        foreach ($orderedIds as $index) {
            $new[] = $this->additional_info[$index];
        }

        $this->additional_info = $new;
        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Additional order updated successfully'
        ]);
    }
    public function addAddress()
    {
        $this->validate([
            'addressName' => 'required|string|max:255',
            'addressValue' => 'required|string|max:255'
        ]);

        $this->address[] = ['name'=>$this->addressName , 'value' => $this->addressValue];

        $this->reset('addressName', 'addressValue');
         $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'address item added successfully'
        ]);
    }

    public function removeAddress($index)
    {
        unset($this->address[$index]);
        $this->address = array_values($this->address);
         $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'address item removed successfully'
        ]);
    }
     public function updateAddressOrder($orderedIds)
    {
        $new = [];

        foreach ($orderedIds as $index) {
            if (array_key_exists($index, $this->address)) {
                $new[] = $this->address[$index];
            }
        }

        $this->address = $new;

        $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'address order updated successfully'
        ]);
    }
    public function save()
    {


        $this->validate([
            'title' => 'required',
            'location_id' => 'required',
            'property_type' => 'required',
        ]);
        try {
            //code...
            if($this->editMode){
                $property = Property::find($this->id);
                $property->title = $this->title;
            $property->location = $this->location;
            $property->type = $this->property_type;
            $property->location_id = $this->location_id;
            $property->status = $this->status;
            $property->featured_image_id = $this->featured_image_id;
            $property->hero_video_id = $this->hero_video_id;
            $property->hero_image_id = $this->hero_image_id;
            $property->description = $this->description;
            $property->gallery = $this->gallery;
            $property->videos = $this->videos;
            $property->embaded_map = $this->embaded_map;
            $property->additional_info = $this->additional_info;
            $property->address = $this->address;
            $property->area_measurement = $this->area_measurement;
            $property->bedroom_count = $this->bedroom_count;
            $property->bathroom_count = $this->bathroom_count;
            $property->parking_count = $this->parking_count;
            $property->amenities = $this->aminities;
            $property->project_type = $this->project_type;
            $property->project_status = $this->project_status;

            // seo details
            $property->slug = $this->slug ? $this->slug : Str::slug($this->title);
            $property->meta_title = $this->meta_title;
            $property->meta_description = $this->meta_description;
            $property->meta_image_id = $this->meta_image_id;
                $property->save();


            }else{

            $property = new Property();
            $property->title = $this->title;
            $property->location = $this->location;
            $property->type = $this->property_type;
            $property->location_id = $this->location_id;
            $property->status = $this->status;
            $property->featured_image_id = $this->featured_image_id;
            $property->hero_video_id = $this->hero_video_id;
            $property->hero_image_id = $this->hero_image_id;
            $property->description = $this->description;
            $property->gallery = $this->gallery;
            $property->videos = $this->videos;
            $property->embaded_map = $this->embaded_map;
            $property->additional_info = $this->additional_info;
            $property->address = $this->address;
            $property->area_measurement = $this->area_measurement;
            $property->bedroom_count = $this->bedroom_count;
            $property->bathroom_count = $this->bathroom_count;
            $property->parking_count = $this->parking_count;
            $property->amenities = $this->aminities;
            $property->project_type = $this->project_type;
            $property->project_status = $this->project_status;
            // seo details
            $property->slug = $this->slug ? $this->slug : Str::slug($this->title);
            $property->meta_title = $this->meta_title;
            $property->meta_description = $this->meta_description;
            $property->meta_image_id = $this->meta_image_id;
            $property->save();
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }


        if($this->editMode){
            $this->dispatch('toast', [
            'type' => 'success',
            'message' => 'Property Updated successfully'
        ]);
        }else{
                $this->reset();
            $this->dispatch('toast', [
                'type' => 'success',
                'message' => 'Property Created successfully'
            ]);
        }

    }
    public function generateSlug()
    {
        if (!$this->title) {
            $this->addError('slug', 'Title is required');
        }
        $this->slug = Str::slug($this->title);

    }
    public function removeMedia($field, $id = null)
    {

        if ($id && is_array($this->$field)) {
            // remove specific file from multiple selection

            if (isset($this->{$field}[$id])) {
                unset($this->{$field}[$id]);
            } else {
                $this->{$field} = array_filter(
                    $this->{$field},
                    fn($item) => ($item['id'] ?? null) != $id
                );
            }

        } else {
            // single file
            $this->$field = null;
        }

    }
    public function addVideo()
    {
        if(isset($this->videos[$this->video_id])){
            return $this->addError('video_id', 'Video already added');
        }
    $this->validate([
        'video_title' => 'required',
        'video_duration' => 'required',
        'video_id' => 'required',
        'video_thumbnail' => 'required',
    ]);

        $this->videos[$this->video_id] = [
            'title' => $this->video_title,
            'sort_order' => $this->video_sort_order,
            'duration' => $this->video_duration,
            'video_id' => $this->video_id,
            'thumbnail_id' => $this->video_thumbnail
        ];

        $this->addVideoModalOpen = false;

        $this->reset(['video_id', 'video_thumbnail', 'video_title', 'video_sort_order', 'video_duration']);
        // dd($this->videos);
    }
       public function render()
    {
        $locations = Location::all();
        return view('livewire.admin.properties.create', compact('locations'))->layout('layouts.admin.admin');
    }

}
