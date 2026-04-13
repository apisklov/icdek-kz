<?php

if (!class_exists('WP_List_Table')) {
    require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';
}

class Analytics_Custom_Table extends WP_List_Table
{

    function get_columns()
    {
        return [
            'cb'            => '<input type="checkbox" />',
            'created_at'    => 'Дата',
            'client_id'     => 'Client ID',
            'chat_id'       => 'Chat ID',
            'source'        => 'Источник',
            'utm_campaign'  => 'utm_campaign',
            'utm_content'   => 'utm_content',
            'utm_medium'    => 'utm_medium',
            'utm_source'    => 'utm_source',
            'utm_term'      => 'utm_term'
        ];
    }

    function prepare_items()
    {
        $columns = $this->get_columns();
        $hidden = [];
        $sortable = $this->get_sortable_columns();
        $this->_column_headers = [$columns, $hidden, $sortable];

        // Получаем данные из БД
        global $wpdb;
        $table_name = $wpdb->prefix . 'messanger_leads';
        $order = isset($_GET['order']) ? $_GET['order'] : 'desc';
        $orderby = isset($_GET['orderby']) ? $_GET['orderby'] : 'created_at';
        $current_page = $this->get_pagenum();
        $per_page = 20;
        $offset = ($current_page - 1) * $per_page;

        $total_items = $wpdb->get_var( "SELECT COUNT(*) FROM $table_name" );

        $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY {$orderby} {$order}", ARRAY_A);

        $results = $wpdb->get_results(
            $wpdb->prepare(
                "SELECT * FROM $table_name ORDER BY id DESC LIMIT %d OFFSET %d",
                $per_page,
                $offset
            ),
            ARRAY_A
        );

        if (! empty($results)) {
            $this->items = $results;
        }

        // Пагинация

        $this->set_pagination_args([
            'total_items'   => $total_items,
            'per_page'      => $per_page,
            'total_pages'   => ceil( $total_items / $per_page )
        ]);
    }

    function column_default($item, $column_name)
    {

        if ($column_name == 'created_at') {
            $timestamp = strtotime($item[$column_name]);
            return date_i18n('j F Y \в H:i:s', $timestamp);
        }

        return $item[$column_name] ?? '';
    }

    function get_sortable_columns()
    {
        return [
            'created_at'    => ['created_at', true],
            'source'        => ['source', true]
        ];
    }
}
