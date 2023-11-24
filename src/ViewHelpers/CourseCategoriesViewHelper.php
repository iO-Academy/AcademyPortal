<?php

namespace Portal\ViewHelpers;

class CourseCategoriesViewHelper
{
    public static function displayCourseCategories(array $categories): string
    {
        $result = '';
        foreach ($categories as $category) {
            $result .=
                '<tr>
                    <td>' . $category['category'] . '</td>
                    <td> <a
                            href="#"
                            type="delete"
                            class="btn btn-danger delete deleteCatBtn"
                            data-id="' . $category['id'] . '">
                            Delete
                         </a>
                     </td>
                 </tr>';
        }
        return $result;
    }
}
