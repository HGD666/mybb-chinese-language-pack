<?php
/**
 * MyBB 1.6 简体中文语言包
 * Copyright © 2010 MyBB Group, All Rights Reserved
 * 翻译制作: MyBB中文化团队 MyBB中文化官方网站: http://www.mybbchina.net/
 * 
 * $Id: moderation.lang.php 5016 2010-06-12 00:24:02Z RyanGordon MyBB中文化团队 $
 */

$l['nav_deletethread'] = "删除主题";
$l['nav_deletepoll'] = "删除投票";
$l['nav_deleteposts'] = "删除选中的帖子";
$l['nav_mergeposts'] = "合并选中的帖子";
$l['nav_move'] = "移动或拷贝主题";
$l['nav_threadnotes'] = "主题备注及管理日志";
$l['nav_getip'] = "查看帖子 IP 地址";
$l['nav_merge'] = "合并主题";
$l['nav_split'] = "分割主题";
$l['nav_multi_deletethreads'] = "线上删除主题";
$l['nav_multi_deleteposts'] = "线上删除帖子";
$l['nav_multi_splitposts'] = "分割选中的帖子";
$l['nav_multi_mergeposts'] = "合并选中的帖子";
$l['nav_multi_movethreads'] = "移动主题";

$l['no_mod_options'] = "这个主题没有执行过管理操作。";
$l['no_delayed_mods'] = "这个主题没有延迟的处理操作需要按计划执行。";
$l['delete_poll'] = "删除投票";
$l['delete_posts'] = "删除帖子";
$l['delete_selected_posts'] = "删除选中的帖子";
$l['posted_by'] = "发帖者为";
$l['delete_thread'] = "删除主题";
$l['get_post_ip'] = "取得发帖 IP 地址";
$l['info_on_ip'] = "此IP地址信息";
$l['ip_address'] = "IP 地址:";
$l['hostname'] = "主机名:";
$l['if_resolvable'] = "(如果能解析)";
$l['mod_options'] = "管理选项:";
$l['search_ip_users'] = "查找使用这个 IP 的用户";
$l['search_ip_posts'] = "查找使用这个 IP 的帖子";
$l['merge_threads'] = "合并主题";
$l['new_subject'] = "新标题:";
$l['thread_to_merge_with'] = "要合并的主题:";
$l['merge_with_note'] = "在右边文本框里填入要并入这里的那个主题的 URL.<br />右边填入的主题将被删除, 其下所有的帖子将全部合并添加到这个主题里。";
$l['merge_posts'] = "合并帖子";
$l['merge_posts_note'] ="所有选中的帖子将被合并到第一个选中的帖子里。";
$l['move_copy_thread'] = "移动 / 拷贝主题";
$l['new_forum'] = "目标版面:";
$l['method'] = "方法";
$l['method_move'] = "移动主题";
$l['method_move_redirect'] = "移动主题并在现有的论坛里保留跳转一些天:";
$l['redirect_expire_note'] = "(留空表示 '不限')";
$l['method_copy'] = "拷贝主题到另一个版面";
$l['split_thread'] = "分割主题";
$l['new_thread_info'] = "新的主题信息";
$l['posts_to_split'] = "帖子分割";
$l['thread_notes_editor'] = "主题备注编辑器";
$l['below_notes'] = "您可以在下面修改这个主题的备注(备忘录)。";
$l['update_notes'] = "更新主题备注";
$l['mod_logs'] = "管理日志 (显示最近的 20 个行为)";
$l['mod_username'] = "用户名";
$l['mod_date'] = "时间";
$l['mod_actions'] = "动作";
$l['mod_information'] = "说明";
$l['read'] = "阅读:";
$l['thread'] = "主题:";
$l['post'] = "帖子:";
$l['forum'] = "版面:";
$l['delete_threads'] = "删除主题";
$l['confirm_delete_threads'] = "您确定要删除选定的主题吗? 一旦主题被删除, 那么其内容包括回帖都将无法恢复, 主题中包含的附件和投票也将同步删除。";
$l['move_threads'] = "移动主题";
$l['confirm_delete_posts'] = "您确定要从这个主题中删除选定的帖子吗? 这些帖子一旦删除就无法恢复, 如果删除了之后主题不再包含帖子那么这个主题也将同步删除。";
$l['post_separator'] = "帖子分隔方式";
$l['new_line'] = "另起一行";
$l['horizontal_rule'] = "水平线";
$l['resolve_fail'] = "N/A (无法解析)";

$l['opened'] = "开放";
$l['closed'] = "关闭";
$l['stuck'] = "置顶";
$l['unstuck'] = "取消置顶";
$l['mod_process'] = "主题{1}";
$l['redirects_removed'] = "主题跳转已删除";
$l['thread_deleted'] = "主题删除: {1}";
$l['poll_deleted'] = "投票删除: {1}";
$l['thread_approved'] = "主题批准: {1}";
$l['thread_unapproved'] = "主题否决: {1}";
$l['deleted_selective_posts'] = "删除选中的帖子 ({1})";
$l['merged_selective_posts'] = "合并选中的帖子";
$l['split_selective_posts'] = "分割帖子 (PIDs: {1}) 于主题 (TID: {2})";
$l['removed_subscriptions'] = "删除所有订阅";
$l['thread_moved'] = "主题移动";
$l['thread_copied'] = "主题拷贝";
$l['thread_merged'] = "主题合并";
$l['thread_split'] = "主题分割";
$l['thread_notes_edited'] = "编辑主题备注";
$l['multi_deleted_threads'] = "主题批量删除";
$l['multi_opened_threads'] = "主题批量开放";
$l['multi_closed_threads'] = "主题批量关闭";
$l['multi_approved_threads'] = "主题批量批准";
$l['multi_unapproved_threads'] = "主题批量否决";
$l['multi_approve_posts'] = "批准选中的帖子";
$l['multi_unapprove_posts'] = "否决选中的帖子";
$l['multi_stuck_threads'] = "主题批量置顶";
$l['multi_unstuck_threads'] = "批量取消置顶";
$l['multi_moved_threads'] = "主题批量移动";
$l['multi_copied_threads'] = "主题批量拷贝";
$l['custom_tool'] = "自定义管理工具: {1}";

$l['delayed_moderation'] = "延迟的处理";
$l['delayed_moderation_desc'] = "在这里您可以按照天数延迟处理操作。";
$l['thread'] = "主题:";
$l['threads'] = "主题:";
$l['threads_selected'] = "选择了 {1} 个主题";
$l['delay_moderation_for'] = "延迟处理 for:";
$l['days'] = "天";
$l['moderation_action'] = "处理操作:";
$l['open_close_thread'] = "打开/关闭 主题";
$l['merge_threads'] = "合并主题";
$l['remove_redirects'] = "移除重定向";
$l['remove_subscriptions'] = "删除订阅";
$l['approve_unapprove_thread'] = "审核/取消审核 主题";
$l['stick_unstick_thread'] = "置顶/取消置顶 主题";
$l['save_delayed_moderation'] = "保存延迟的处理";
$l['custom'] = "自定义";
$l['delayed_mod_queue'] = "延迟的处理队列";
$l['days_to_perform_action'] = "天 执行操作";
$l['leave_redirect'] = "引导重定向:";
$l['multiple_threads'] = "多主题";
$l['actions'] = "操作";
$l['cancel'] = "取消";
$l['leave_redirect_for'] = "离开重定向 for:";
$l['redirect_forever'] = "永远";

$l['error_nomergeposts'] = "您需要从主题里选择一个或多个帖子才能将它们合并在一起。";
$l['error_cantsplitonepost'] = "您无法分割只包含一个帖子的主题。";
$l['error_badmergeurl'] = "要被合并的主题的 URL 似乎无效或者是空的, 请将切确的 URL 拷贝或填入那个文本框中.<br />请返回重试。";
$l['error_inline_nothreadsselected'] = "抱歉, 您没有选取任何主题以执行线上管理操作, 或者您之前的管理会话已经过期 (1 小时没动作会自动失效). 请选取一些主题后重试。";
$l['error_inline_nopostsselected'] = "抱歉，您没有选取任何帖子以执行操作，或者你之前的操作 session 已经过期 (1小时候自动失效)。请选择一些帖子然后重试。";
$l['error_inline_nopostsselected'] = "抱歉, 您没有选取任何帖子以执行线上管理操作, 或者您之前的管理会话已经过期 (1 小时没动作会自动失效). 请选取一些帖子后重试。";
$l['error_cantsplitall'] = "您不能把所有的帖子从这个主题分割出去! 如果这样, 那留什么给这个主题?";
$l['error_nosplitposts'] = "您不能分割这个主题, 因为您没有从主题里选择任何帖子。";
$l['error_movetosameforum'] = "您不能把这个主题移动到这个版面, 因为它本来就在这. 请选择其它版面。";
$l['error_mergewithself'] = "主题不能自己跟自己合并.<br />请返回输入一个有效的 URL。";
$l['error_delayedmoderation_unsupported_type'] = "抱歉，你没有选择一个有效的延迟处理操作类型。";
$l['error_delayedmoderation_unsupported_method'] = "抱歉，你没有为这个延迟处理操作选择一个有效的移动方式。";
$l['error_delayedmoderation_invalid_delay'] = "抱歉，你没有为这个延迟处理操作选择一个有效的延迟时间。";

$l['redirect_pollnotdeleted'] = "投票没有删除, 因为您没有勾选 \"删除\" 这个复选框.<br />现在将返回该主题。";
$l['redirect_polldeleted'] = "谢谢, 投票已经删除.<br />现在将返回该主题。";
$l['redirect_mergeposts'] = "选中的帖子已经合并在一起, 您现在将返回该主题。";
$l['redirect_openthread'] = "非常感谢, 这个主题已经成功被开放.<br />现在将返回该主题。";
$l['redirect_closethread'] = "非常感谢, 这个主题已经成功被关闭.<br />现在将返回该主题。";
$l['redirect_stickthread']  = "非常感谢, 这个主题已经成功被置顶.<br />现在将返回该主题。";
$l['redirect_unstickthread'] = "非常感谢, 这个主题已经被取消置顶.<br />现在将返回该主题。";
$l['redirect_threaddeleted'] = "非常感谢, 这个主题已经被删除. <br />现在将返回到论坛版面。";
$l['redirect_threadmoved'] = "这个主题已经成功地移入或拷入选择的论坛版面里.<br />现在将返回查看它。";
$l['redirect_redirectsremoved'] = "这个主题的所有移动跳转已经被删除.<br />现在将返回该主题。";
$l['redirect_threadapproved'] = "这个主题已经成功地被批准了。";
$l['redirect_threadunapproved'] = "这个主题已经成功地被否决了。";
$l['redirect_threadsplit'] = "这个主题已经成功地被分割了.<br />现在将转入访问新主题。";
$l['redirect_threadnotesupdated'] = "非常感谢, 这个主题的备注已经成功更新.<br />现在将返回该主题。";
$l['redirect_threadsmerged'] = "非常感谢, 那两个主题已经成功的被合并在一起.<br />现在将转入访问新主题。";
$l['redirect_inline_threadsdeleted'] = "选中的主题已经被删除.<br />现在将返回您之前的位置。";
$l['redirect_inline_threadsopened'] = "选中的主题已经被开放.<br />现在将返回您之前的位置。";
$l['redirect_inline_threadsclosed'] = "选中的主题已经被关闭.<br />现在将返回您之前的位置。";
$l['redirect_inline_threadsstuck'] = "选中的主题已经被置顶.<br />现在将返回您之前的位置。";
$l['redirect_inline_threadsunstuck'] = "选中的主题已经被取消置顶.<br />现在将返回您之前的位置。";
$l['redirect_inline_threadsmoved'] = "选中的主题已经被移动.<br />现在将返回移入的论坛版面。";
$l['redirect_inline_threadsapproved'] = "选中的主题已经被批准.<br />现在将返回您之前的位置。";
$l['redirect_inline_threadsunapproved'] = "选中的主题已经被否决.<br />现在将返回您之前的位置。";
$l['redirect_inline_postsmerged'] = "选中的帖子已经被合并在一起.<br />现在将返回您之前的位置。";
$l['redirect_inline_postsapproved'] = "选中的帖子已经被批准.<br />现在将返回您之前的位置。";
$l['redirect_inline_postsunapproved'] = "选中的帖子已经被否决.<br />现在将返回您之前的位置。";
$l['redirect_postsdeleted'] = "选中的帖子已经被成功删除.<br />现在将返回您之前的位置。";
$l['redirect_removed_subscriptions'] = "所有针对这个主题的订阅已经被成功删除.<br />现在将返回该主题。";
$l['redirect_customtool_thread'] = "管理工具 \"{1}\" 成功执行.<br />现在将返回该主题。";
$l['redirect_customtool_forum'] = "管理工具 \"{1}\" 成功执行.<br />现在将返回论坛版面。";
$l['redirect_customtool_search'] = "管理工具 \"{1}\" 成功执行.<br />现在将返回搜索。";
$l['redirect_delayed_moderation_thread'] = "选定的处理工具已经保存并且延迟 {1} 天。<br />现在将返回到主题。";
$l['redirect_delayed_moderation_forum'] = "选定的处理工具已经保存并且延迟 {1} 天。<br />现在将返回到版块。";
$l['redirect_delayed_moderation_search'] = "选定的处理工具已经保存并且延迟 {1} 天。<br />现在将返回到搜索。";
$l['redirect_delayed_moderation_cancelled'] = "选则的延迟处理操作已经取消。<br />现在将返回到延迟处理页面。";
?>