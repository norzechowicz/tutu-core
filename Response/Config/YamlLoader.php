<?php

namespace Coduo\TuTu\Response\Config;

use Symfony\Component\Yaml\Yaml;

class YamlLoader implements Loader
{
    private $responsesYamlPath;

    /**
     * @param $responsesYamlPath
     * @throws \InvalidArgumentException
     * @internal param $ [] $yamlFileContent
     */
    public function __construct($responsesYamlPath)
    {
        if (!file_exists($responsesYamlPath)) {
            throw new \InvalidArgumentException(sprintf("File \"%s\" does not exist.", $responsesYamlPath));
        }

        $this->responsesYamlPath = $responsesYamlPath;
    }

    /**
     * @return array
     */
    public function getResponsesArray()
    {
        return Yaml::parse($this->responsesYamlPath);
    }
}
