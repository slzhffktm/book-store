package media

import (
	"bytes"
	"fmt"
	"os"
	"path/filepath"

	"bitbucket.org/sellfazz/backend/pkg/media"
)

// UploadOutput represents the return of Upload function
type UploadOutput struct {
	Location string
}

// Service is an interface for media service
type Service interface {
	Upload(path string) (*UploadOutput, error)
}

type mediaService struct {
	mediaStorage media.Storage
}

func (ms *mediaService) Upload(path string) (*UploadOutput, error) {
	file, err := os.Open(path)
	if err != nil {
		fmt.Printf("err opening file: %s", err)
		return nil, err
	}
	defer file.Close()

	fileInfo, _ := file.Stat()
	buffer := make([]byte, fileInfo.Size())
	file.Read(buffer)

	fileBytes := bytes.NewReader(buffer)

	result, err := ms.mediaStorage.Store("/media/"+filepath.Base(path), fileBytes)

	if err != nil {
		return nil, err
	}

	return &UploadOutput{
		Location: result.Location,
	}, nil
}

// NewService creates a new media service
func NewService(mediaStorage media.Storage) Service {
	return &mediaService{
		mediaStorage: mediaStorage,
	}
}
