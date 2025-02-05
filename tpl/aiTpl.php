<?php
<<< EOF

type Activity struct {
    ID           int64      `gorm:"primaryKey;autoIncrement;column:id" json:"id"`
	ActivityCode string     `gorm:"uniqueIndex;size:32;column:activity_code" json:"activity_code"` // 活动编码
	ActivityType string     `gorm:"size:20;column:activity_type" json:"activity_type"`            // 活动类型
	Title        string     `gorm:"size:100;column:title" json:"title"`                           // 活动标题
	Desc         string     `gorm:"size:500;column:desc" json:"desc"`                             // 活动描述
	Image        string     `gorm:"size:255;column:image" json:"image"`                           // 活动图片
	Url          string     `gorm:"size:512;column:url" json:"url"`                               // 活动链接地址
	IsUp         int        `gorm:"default:0;column:is_up" json:"is_up"`                          // 是否上架：0-否 1-是
	IsDelete     int        `gorm:"default:0;column:is_delete" json:"is_delete"`                  // 是否删除 0否 1是
	SortValue    int32      `gorm:"column:sort_value" json:"sort_value"`                          // 排序值
	StartAt      time.Time  `gorm:"column:start_at" json:"start_at"`                              // 活动开始时间
	EndAt        time.Time  `gorm:"column:end_at" json:"end_at"`                                  // 结束时间
	RoomImg      string     `gorm:"size:255;column:room_img" json:"room_img"`                     // 房间角标icon
	RoomImgUp    int        `gorm:"default:0;column:room_img_up" json:"room_img_up"`              // 房间角标是否上架
	PartyImg     string     `gorm:"size:255;column:party_img" json:"party_img"`                   // 派对banner
	PartyImgUp   int        `gorm:"default:0;column:party_img_up" json:"party_img_up"`            // 派对banner是否上架
	GiftImg      string     `gorm:"size:255;column:gift_img" json:"gift_img"`                     // 礼物面板banner
	GiftImgUp    int        `gorm:"default:0;column:gift_img_up" json:"gift_img_up"`              // 礼物面板是否上架
	CreatedAt    *time.Time `gorm:"autoCreateTime;column:created_at" json:"created_at"`           // 创建时间
	UpdatedAt    *time.Time `gorm:"autoUpdateTime;column:updated_at" json:"updated_at"`           // 更新时间
}

func (Activity) TableName() string {
    return "activity"
}
EOF;
