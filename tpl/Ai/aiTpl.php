<?php
<<< EOF

type Activity struct {
    Id              int32
	RelatedId       int32  // 关联业务id
	BizType         string // 业务类型 voice-房间 user-用户
	BizId           int32
	BizNumber       string
	BizField        string // 业务字段名称
	BizContent      string // 业务审核内容
	BizContentType  string // 业务审核内容类型：text-文本 image-图片 video-视频文件
	RebotStatus     string // 机器审核状态 init-待审核 success-审核通过  suspicion-嫌疑 reject-审核拒绝
	RebotResult     string // 机审结果
	RebotAt         string // 机器审核时间
	RehearStatus    string // 复审状态 init-待审核 success-审核通过 reject-审核拒绝
	RehearResult    string //复审结果：success-复审通过 reject-复审驳回
	RehearAt        int32  // 后台审核操作时间
	RehearUserId    int32  // 后台审核操作人
	RequestId       string
	TaskId          string
	OriginalContent string
	CreatedAt       *LocalTime // 创建时间
	UpdatedAt       *LocalTime // 更新时间
	DataGroup       string     `json:"data_group"`                        // 数据分组
	ReviewStatus    string     `json:"review_status" gorm:"default:init"` //复审状态 init-待复审 pass-复审完成
}

func (Activity) TableName() string {
    return "activity"
}
EOF;
