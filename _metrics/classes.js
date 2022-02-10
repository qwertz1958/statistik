var classes = [
    {
        "name": "App\\Logger\\OwnLogger",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "write",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 1,
        "nbMethods": 1,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 1,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 8,
        "ccn": 8,
        "ccnMethodMax": 8,
        "externals": [
            "Silalahi\\Slim\\Logger"
        ],
        "parents": [
            "Silalahi\\Slim\\Logger"
        ],
        "lcom": 1,
        "length": 62,
        "vocabulary": 28,
        "volume": 298.06,
        "difficulty": 4.78,
        "effort": 1425.49,
        "level": 0.21,
        "bugs": 0.1,
        "time": 79,
        "intelligentContent": 62.32,
        "number_operators": 18,
        "number_operands": 44,
        "number_operators_unique": 5,
        "number_operands_unique": 23,
        "cloc": 11,
        "loc": 45,
        "lloc": 34,
        "mi": 82.85,
        "mIwoC": 48.19,
        "commentWeight": 34.66,
        "kanDefect": 0.58,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 2,
        "relativeSystemComplexity": 2,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 2,
        "totalSystemComplexity": 2,
        "package": "App\\Logger\\",
        "pageRank": 0.1,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Action\\Zusatz",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getZusatz",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 2,
        "ccn": 1,
        "ccnMethodMax": 1,
        "externals": [
            "Tqdev\\PhpCrudApi\\Middleware\\Router\\Router",
            "Tqdev\\PhpCrudApi\\Controller\\Responder",
            "Tqdev\\PhpCrudApi\\Database\\GenericDB",
            "Tqdev\\PhpCrudApi\\Column\\ReflectionService",
            "Tqdev\\PhpCrudApi\\Cache\\Cache",
            "Psr\\Http\\Message\\ResponseInterface",
            "Psr\\Http\\Message\\ServerRequestInterface"
        ],
        "parents": [],
        "lcom": 1,
        "length": 40,
        "vocabulary": 20,
        "volume": 172.88,
        "difficulty": 1.72,
        "effort": 297.73,
        "level": 0.58,
        "bugs": 0.06,
        "time": 17,
        "intelligentContent": 100.38,
        "number_operators": 9,
        "number_operands": 31,
        "number_operators_unique": 2,
        "number_operands_unique": 18,
        "cloc": 1,
        "loc": 25,
        "lloc": 24,
        "mi": 69.33,
        "mIwoC": 54.09,
        "commentWeight": 15.25,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 25,
        "relativeDataComplexity": 0.67,
        "relativeSystemComplexity": 25.67,
        "totalStructuralComplexity": 50,
        "totalDataComplexity": 1.33,
        "totalSystemComplexity": 51.33,
        "package": "App\\Action\\",
        "pageRank": 0.1,
        "afferentCoupling": 0,
        "efferentCoupling": 7,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\ErrorCodes",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "getErrorCodeStatic",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getErrorCode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "extractErrorCode",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAllErrorCodes",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getAllErrorCodeAsJson",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "findStatusCodeForInternError",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getErrorStatusStatic",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getErrorStatus",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 8,
        "nbMethods": 8,
        "nbMethodsPrivate": 2,
        "nbMethodsPublic": 6,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 17,
        "ccn": 10,
        "ccnMethodMax": 3,
        "externals": [
            "Exception"
        ],
        "parents": [],
        "lcom": 3,
        "length": 224,
        "vocabulary": 117,
        "volume": 1538.96,
        "difficulty": 6.08,
        "effort": 9352.69,
        "level": 0.16,
        "bugs": 0.51,
        "time": 520,
        "intelligentContent": 253.23,
        "number_operators": 33,
        "number_operands": 191,
        "number_operators_unique": 7,
        "number_operands_unique": 110,
        "cloc": 38,
        "loc": 112,
        "lloc": 74,
        "mi": 74.8,
        "mIwoC": 35.56,
        "commentWeight": 39.24,
        "kanDefect": 1.19,
        "relativeStructuralComplexity": 9,
        "relativeDataComplexity": 2.16,
        "relativeSystemComplexity": 11.16,
        "totalStructuralComplexity": 72,
        "totalDataComplexity": 17.25,
        "totalSystemComplexity": 89.25,
        "package": "App\\",
        "pageRank": 0.31,
        "afferentCoupling": 1,
        "efferentCoupling": 1,
        "instability": 0.5,
        "violations": {}
    },
    {
        "name": "App\\Error\\CustomErrorHandler",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__invoke",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "Throwable",
            "App\\ErrorCodes"
        ],
        "parents": [],
        "lcom": 2,
        "length": 37,
        "vocabulary": 17,
        "volume": 151.24,
        "difficulty": 3.69,
        "effort": 558.41,
        "level": 0.27,
        "bugs": 0.05,
        "time": 31,
        "intelligentContent": 40.96,
        "number_operators": 13,
        "number_operands": 24,
        "number_operators_unique": 4,
        "number_operands_unique": 13,
        "cloc": 5,
        "loc": 22,
        "lloc": 17,
        "mi": 91.29,
        "mIwoC": 57.63,
        "commentWeight": 33.66,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.3,
        "relativeSystemComplexity": 81.3,
        "totalStructuralComplexity": 162,
        "totalDataComplexity": 0.6,
        "totalSystemComplexity": 162.6,
        "package": "App\\Error\\",
        "pageRank": 0.1,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "Oefenweb\\Statistics\\StatisticsError",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [],
        "nbMethodsIncludingGettersSetters": 0,
        "nbMethods": 0,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 0,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 0,
        "ccn": 1,
        "ccnMethodMax": 0,
        "externals": [
            "Exception"
        ],
        "parents": [
            "Exception"
        ],
        "lcom": 0,
        "length": 0,
        "vocabulary": 0,
        "volume": 0,
        "difficulty": 0,
        "effort": 0,
        "level": 0,
        "bugs": 0,
        "time": 0,
        "intelligentContent": 0,
        "number_operators": 0,
        "number_operands": 0,
        "number_operators_unique": 0,
        "number_operands_unique": 0,
        "cloc": 4,
        "loc": 8,
        "lloc": 4,
        "mi": 215.46,
        "mIwoC": 171,
        "commentWeight": 44.46,
        "kanDefect": 0.15,
        "relativeStructuralComplexity": 0,
        "relativeDataComplexity": 0,
        "relativeSystemComplexity": 0,
        "totalStructuralComplexity": 0,
        "totalDataComplexity": 0,
        "totalSystemComplexity": 0,
        "package": "Oefenweb\\Statistics\\",
        "pageRank": 0.1,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Tool\\Statistics",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "sum",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "min",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "max",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "mean",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "frequency",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "mode",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "squaredDifference",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "variance",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "standardDeviation",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "range",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 10,
        "nbMethods": 10,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 9,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 19,
        "ccn": 10,
        "ccnMethodMax": 4,
        "externals": [
            "App\\Tool\\StatisticsError",
            "App\\Tool\\StatisticsError",
            "App\\Tool\\StatisticsError"
        ],
        "parents": [],
        "lcom": 10,
        "length": 131,
        "vocabulary": 26,
        "volume": 615.76,
        "difficulty": 23.03,
        "effort": 14180.54,
        "level": 0.04,
        "bugs": 0.21,
        "time": 788,
        "intelligentContent": 26.74,
        "number_operators": 44,
        "number_operands": 87,
        "number_operators_unique": 9,
        "number_operands_unique": 17,
        "cloc": 70,
        "loc": 155,
        "lloc": 85,
        "mi": 80.18,
        "mIwoC": 37.04,
        "commentWeight": 43.15,
        "kanDefect": 1.1,
        "relativeStructuralComplexity": 1,
        "relativeDataComplexity": 6.15,
        "relativeSystemComplexity": 7.15,
        "totalStructuralComplexity": 10,
        "totalDataComplexity": 61.5,
        "totalSystemComplexity": 71.5,
        "package": "App\\Tool\\",
        "pageRank": 0.1,
        "afferentCoupling": 0,
        "efferentCoupling": 1,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\Middleware\\CheckLogin",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "__invoke",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "checkUserPassword",
                "role": null,
                "public": false,
                "private": true,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "getNavigation",
                "role": "getter",
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 4,
        "nbMethods": 3,
        "nbMethodsPrivate": 1,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 1,
        "nbMethodsSetters": 0,
        "wmc": 13,
        "ccn": 10,
        "ccnMethodMax": 8,
        "externals": [
            "Slim\\Http\\Request",
            "Slim\\Http\\Response"
        ],
        "parents": [],
        "lcom": 1,
        "length": 102,
        "vocabulary": 31,
        "volume": 505.33,
        "difficulty": 16.9,
        "effort": 8542.45,
        "level": 0.06,
        "bugs": 0.17,
        "time": 475,
        "intelligentContent": 29.89,
        "number_operators": 31,
        "number_operands": 71,
        "number_operators_unique": 10,
        "number_operands_unique": 21,
        "cloc": 26,
        "loc": 79,
        "lloc": 53,
        "mi": 80.93,
        "mIwoC": 42.11,
        "commentWeight": 38.81,
        "kanDefect": 0.43,
        "relativeStructuralComplexity": 36,
        "relativeDataComplexity": 0.64,
        "relativeSystemComplexity": 36.64,
        "totalStructuralComplexity": 144,
        "totalDataComplexity": 2.57,
        "totalSystemComplexity": 146.57,
        "package": "App\\Middleware\\",
        "pageRank": 0.1,
        "afferentCoupling": 0,
        "efferentCoupling": 2,
        "instability": 1,
        "violations": {}
    },
    {
        "name": "App\\HealthController",
        "interface": false,
        "abstract": false,
        "final": false,
        "methods": [
            {
                "name": "__construct",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            },
            {
                "name": "get",
                "role": null,
                "public": true,
                "private": false,
                "_type": "Hal\\Metric\\FunctionMetric"
            }
        ],
        "nbMethodsIncludingGettersSetters": 2,
        "nbMethods": 2,
        "nbMethodsPrivate": 0,
        "nbMethodsPublic": 2,
        "nbMethodsGetter": 0,
        "nbMethodsSetters": 0,
        "wmc": 3,
        "ccn": 2,
        "ccnMethodMax": 2,
        "externals": [
            "App\\Service\\Health\\Health",
            "App\\Service\\Health\\DtoHealthFtp",
            "Slim\\Psr7\\Request",
            "Slim\\Psr7\\Response"
        ],
        "parents": [],
        "lcom": 1,
        "length": 36,
        "vocabulary": 17,
        "volume": 147.15,
        "difficulty": 4.31,
        "effort": 633.87,
        "level": 0.23,
        "bugs": 0.05,
        "time": 35,
        "intelligentContent": 34.16,
        "number_operators": 8,
        "number_operands": 28,
        "number_operators_unique": 4,
        "number_operands_unique": 13,
        "cloc": 16,
        "loc": 41,
        "lloc": 25,
        "mi": 95.24,
        "mIwoC": 54.06,
        "commentWeight": 41.18,
        "kanDefect": 0.22,
        "relativeStructuralComplexity": 81,
        "relativeDataComplexity": 0.3,
        "relativeSystemComplexity": 81.3,
        "totalStructuralComplexity": 162,
        "totalDataComplexity": 0.6,
        "totalSystemComplexity": 162.6,
        "package": "App\\",
        "pageRank": 0.1,
        "afferentCoupling": 0,
        "efferentCoupling": 4,
        "instability": 1,
        "violations": {}
    }
]