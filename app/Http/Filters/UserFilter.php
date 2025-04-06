<?php

namespace App\Http\Filters {

    use Spatie\Permission\Models\Role;
    use Spatie\QueryBuilder\Filters\Filter;
    use Illuminate\Database\Eloquent\Builder;

	class UserFilter implements Filter
	{
        public function __invoke(Builder $query, $value, string $property)
        {
            return $query
                ->where('name', 'like', '%' . $value . '%')
                ->orWhere('email', 'like', '%' . $value . '%');
        }
	}
}
