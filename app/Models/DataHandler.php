<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;

class DataHandler extends Model
{
    use HasFactory;

    public function decodeJson(string $doc, string $location = 'content') : object
    {
        $json = Storage::get($location.'/'.$doc.'.json');
        $decodedJson = json_decode($json);

        return $decodedJson;
    }

    public function getFeatureDescription(object $data, string $className, string $query)
    {
        $className = ucwords($className);
        $nextStep = 'Class Features';
        $description = $data->$className->$nextStep;

        $query = explode('/', $query);
        $lastElem = end($query);
        foreach ($query as $key => $step) {
            $description = $description->$step;
        }

        $str = '';
        if (gettype($description) == 'object') {
            if (gettype($description->content) == 'array') {
                $str = $this->mergeArrayToString($description->content);
            } else {
                $str = $description->content;
                $nextStepSpellcasting = "Preparing and Casting Spells";
                if (isset($description->$lastElem)) {
                    $table = (array) $description->$lastElem->table;
                    $headLines = $table[array_key_first($table)];
                    $newTable = [];
                    foreach ($table as $column) {
                        foreach ($headLines as $key => $headLine) {
                            $newTable[$headLine] = $column[$key];
                        }
                    }
                    $str = $str.'<table><tr>';
                    foreach ($table as $key => $value) {
                        $str = $str.'<th>'.$key.'</th>';
                    }
                    $str = $str.'</tr>';
                    foreach ($newTable as $key => $line) {
                        $str = $str.'<tr>';
                        $str = $str.'<td>'.$key.'</td>';
                        $str = $str.'<td>'.$line.'</td>';
                        $str = $str.'</tr>';
                    }
                    $str = $str.'</table>';
                } elseif (isset($description->$nextStepSpellcasting) && isset($description->$nextStepSpellcasting->content)) {
                    $str = $this->mergeArrayToString($description->$nextStepSpellcasting->content);
                }
            }
        }

        return $str;
    }

    public function mergeArrayToString(array $array, bool $toList = false)
    {
        $str = '';
        foreach ($array as $key => $elem) {
            if (gettype($elem) == 'array') {
                $elem = $this->mergeArrayToString($elem, true);
                $str = $str.'<ul>';
                $str = $str.$elem;
                $str = $str.'</ul>';
            } else {
                if ($toList === true) {
                    $str = $str.'<li>'.$elem.'</li>';
                } else {
                    if ($str !== '') {
                        $str = $str.'</br>';
                    }
                    $str = $str.$elem;
                }
            }
        }

        return $str;
    }

    public function createFeature(object $datas, DndClass $class, array $attributes) : Feature
    {
        $featureName = $attributes['display_name'];
        $className = $class->name;
        echo('Creating feature : '.$featureName. PHP_EOL);
        $descriptionText = $this->getFeatureDescription($datas, $className, $featureName);
        $description = Description::create([
            'text' => $descriptionText,
            'is_custom' => 0,
        ]);

        $attributes = array_merge($attributes, ['feature_list_id' => $class->feature_list_id, 'description_id' => $description->id,]);

        $feature = Feature::create($attributes);

        return $feature;
    }
}
