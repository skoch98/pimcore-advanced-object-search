<?php

namespace AdvancedObjectSearchBundle\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Pimcore\AssetMetadataClassDefinitionsBundle\Model\Configuration\Dao;
use Pimcore\Config;
use Pimcore\Db;
use Pimcore\Migrations\Migration\AbstractPimcoreMigration;
use Pimcore\Model\Tool\SettingsStore;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20210305134111 extends AbstractPimcoreMigration
{
    public function doesSqlMigrations(): bool
    {
        return false;
    }

    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $db = Db::get();
        $entry = $db->fetchRow(
            'SELECT * FROM pimcore_migrations WHERE migration_set = ? AND version = ?',
            ['AdvancedObjectSearchBundle', '00000001']
        );

        if($entry && !empty($entry['migrated_at'])) {
            SettingsStore::set('BUNDLE_INSTALLED__AdvancedObjectSearchBundle\\AdvancedObjectSearchBundle', true, 'bool', 'pimcore');
        }
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
    }
}