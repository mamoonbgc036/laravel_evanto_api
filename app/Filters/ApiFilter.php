<?php

namespace App\Filters;

class ApiFilter
{
    protected $safeParams = [];
    protected $operatorMap = [];

    protected $columMap = [];

    public function transform($request)
    {
        $eloQuery = [];
        foreach ($this->safeParams as $parms => $operators) {
            $query = $request->query($parms);
            if (!isset($query)) {
                continue;
            }

            $column = $this->columMap[$parms] ?? $parms;
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}
