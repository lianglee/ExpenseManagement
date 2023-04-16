<?php
/**
 * Open Source Social Network
 *
 * @package   (softlab24.com).ossn
 * @author    OSSN Core Team <info@softlab24.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
class ExpenseManagement extends OssnObject {
		public function addItem(int $day, int $month, int $year, string $item, float $price) {
				if(empty($item) || empty($price) || empty($day) || empty($month) || empty($year)) {
						return false;
				}
				$this->owner_guid = ossn_loggedin_user()->guid;
				$this->type       = 'user';
				$this->subtype    = 'expense:item';
				$this->title      = $item;
				
				$this->data->price = $price;
				$this->data->day   = $day;
				$this->data->month = $month;
				$this->data->year  = $year;
				
				return $this->addObject();
		}
		public function getYears(int $user_guid) {
				if(empty($user_guid)) {
						return false;
				}
				$args = array(
						'from' => 'ossn_object as o',
						'params' => array(
								'emd.value'
						),
						'joins' => array(
								'JOIN ossn_entities as e ON (o.guid=e.owner_guid AND e.type="object" AND e.subtype="year")',
								'JOIN ossn_entities_metadata as emd ON (e.guid=emd.guid)'
						),
						'wheres' => array(
								$this->constructWheres(array(
										"o.owner_guid='{$user_guid}'",
										'o.subtype="expense:item"'
								))
						),
						'order_by' => 'emd.value DESC',
						'group_by' => 'emd.value'
				);
				$list = $this->select($args, true);
				if($list){
					foreach($list as $item){
						$lists[$item->value] = $item->value;	
					}
					return $lists;
				} else {
					return array(date('Y'));	
				}
		}
		public function getList(int $user_guid, int $month, int $year, $query = '', $params = array()) {
				if(empty($user_guid) || empty($month) || empty($year)) {
						return false;
				}
				$vars = array(
						'type' => 'user',
						'subtype' => 'expense:item',
						'title' => $query,
						'page_limit' => false,
						'owner_guid' => $user_guid,
						'entities_pairs' => array(
								array(
										'name' => 'month',
										'value' => $month
								),
								array(
										'name' => 'year',
										'value' => $year
								)
						)
				);
				$args = array_merge($vars, $params);
				return $this->searchObject($args);
		}
		public function getTotal(int $user_guid, int $month, int $year){
				$list = $this->getList($user_guid, 	$month, $year);
				if($list){
					foreach($list as $item){
						$prices[] = floatval($item->price);
					}
					return array_sum($prices);
				}
				return "---";
		}
		public function getMonthStatus(int $user_guid, int $month, int $year){
				return $this->getList($user_guid, 	$month, $year, '', array(
							'page_limit' => 1,													 
				));
		}
} //class